<?php

$js_array = [
    "js/jquery-3.2.1.min.js",
    "plugins/arbor/arbor.js",
    "plugins/arbor/arbor-tween.js",
    "plugins/arbor/graphics.js",
    "plugins/arbor/renderer.js"
];

foreach ($js_array as $js) {
    $js_link = $folder_template . '/' . $js;
    echo "<script src='$js_link'></script>";
}
?>

<canvas id="sitemap"></canvas>

<script>
(function($){  
    var Renderer = function(elt){
        var dom = $(elt)
        var canvas = dom.get(0)
        var ctx = canvas.getContext("2d");
        var gfx = arbor.Graphics(canvas)
        var sys = null
        
        var _vignette = null
        var selected = null,
        nearest = null,
        _mouseP = null;
        
        
        var that = {
            init:function(pSystem){
                sys = pSystem
                sys.screen({size:{width:dom.width(), height:dom.height()},
                padding:[36,60,36,60]})
                
                $(window).resize(that.resize)
                that.resize()
                that._initMouseHandling()
                
                // Preload all images into the node object
                sys.eachNode(function(node, pt) {
                    if(node.data.image) {
                        node.data.imageob = new Image()
                        node.data.imageob.src = node.data.image
                    }
                })
            },
            resize:function(){
                canvas.width = $(window).width()
                canvas.height = .75* $(window).height()
                sys.screen({size:{width:canvas.width, height:canvas.height}})
                _vignette = null
                that.redraw()
            },
            redraw:function(){
                gfx.clear()
                sys.eachEdge(function(edge, p1, p2){
                    if (edge.source.data.alpha * edge.target.data.alpha == 0) return
                    gfx.line(p1, p2, {stroke:"#f44f00", width:1, alpha:edge.target.data.alpha})
                })
                sys.eachNode(function(node, pt){
                    var imageob = node.data.imageob
                    var imageH = node.data.image_h
                    var imageW = node.data.image_w
                    var radius = -110;

                    var w = Math.max(20, 20+gfx.textWidth(node.name) )
                    if (node.data.alpha===0) return
                    if (node.data.shape=='dot'){
                        gfx.oval(pt.x-w/2, pt.y-w/2, w, w, {fill:"#f44f00", alpha:node.data.alpha})
                        gfx.text(node.name, pt.x, pt.y+7, {color:"white", align:"center", font:"Libre Franklin", size:13})
                        gfx.text(node.name, pt.x, pt.y+7, {color:"white", align:"center", font:"Libre Franklin", size:13})
                        if (imageob){
                            // Images are drawn from cache
                            ctx.drawImage(imageob, pt.x-(imageW/2) + 23, pt.y+radius/2, imageW, imageH)
                        }
                    }else{
                        gfx.rect(pt.x-w/2, pt.y-8, w, 20, 4, {fill:node.data.color, alpha:node.data.alpha})
                        gfx.text(node.name, pt.x, pt.y+9, {color:"white", align:"center", font:"Libre Franklin", size:12})
                        gfx.text(node.name, pt.x, pt.y+9, {color:"white", align:"center", font:"Libre Franklin", size:12})
                    }
                })
            },
            
            switchMode:function(e){
                if (e.mode=='hidden'){
                    dom.stop(true).fadeTo(e.dt,0, function(){
                        if (sys) sys.stop()
                        $(this).hide()
                    })
                }else if (e.mode=='visible'){
                    dom.stop(true).css('opacity',0).show().fadeTo(e.dt,1,function(){
                        that.resize()
                    })
                    if (sys) sys.start()
                }
            },
            
            switchSection:function(newSection){
                var parent = sys.getEdgesFrom(newSection)[0].source
                var children = $.map(sys.getEdgesFrom(newSection), function(edge){
                    return edge.target
                })
                
                sys.eachNode(function(node){
                    if (node.data.shape=='dot') return // skip all but leafnodes
                    
                    var nowVisible = ($.inArray(node, children)>=0)
                    var newAlpha = (nowVisible) ? 1 : 0
                    var dt = (nowVisible) ? .5 : .5
                    sys.tweenNode(node, dt, {alpha:newAlpha})
                    
                    if (newAlpha==1){
                        node.p.x = parent.p.x + .05*Math.random() - .025
                        node.p.y = parent.p.y + .05*Math.random() - .025
                        node.tempMass = .001
                    }
                })
            },
            
            _initMouseHandling:function(){
                // no-nonsense drag and drop (thanks springy.js)
                selected = null;
                nearest = null;
                var dragged = null;
                var oldmass = 1
                
                var _section = null
                
                var handler = {
                    moved:function(e){
                        var pos = $(canvas).offset();
                        _mouseP = arbor.Point(e.pageX-pos.left, e.pageY-pos.top)
                        nearest = sys.nearest(_mouseP);
                        
                        if (!nearest.node) return false
                        
                        if (nearest.node.data.shape=='dot'){
                            selected = (nearest.distance < 50) ? nearest : null
                            if (selected){
                                dom.addClass('linkable')
                                window.status = selected.node.data.link.replace(/^\//,"http://"+window.location.host+"/").replace(/^#/,'')
                            }
                            else{
                                dom.removeClass('linkable')
                                window.status = ''
                            }
                        }else if ($.inArray(nearest.node.name, ['arbor.js','code','docs','demos']) >=0 ){
                            if (nearest.node.name!=_section){
                                _section = nearest.node.name
                                that.switchSection(_section)
                            }
                            dom.removeClass('linkable')
                            window.status = ''
                        }
                        
                        return false
                    },
                    clicked:function(e){
                        var pos = $(canvas).offset();
                        _mouseP = arbor.Point(e.pageX-pos.left, e.pageY-pos.top)
                        nearest = dragged = sys.nearest(_mouseP);
                        
                        if (nearest && selected && nearest.node===selected.node){
                            var link = selected.node.data.link

                            $('html, body').animate({
                                scrollTop: $(link).offset().top
                            }, 800);

                            return false
                        }
                        
                        
                        if (dragged && dragged.node !== null) dragged.node.fixed = true
                        
                        $(canvas).unbind('mousemove', handler.moved);
                        $(canvas).bind('mousemove', handler.dragged)
                        $(window).bind('mouseup', handler.dropped)
                        
                        return false
                    },
                    dragged:function(e){
                        var old_nearest = nearest && nearest.node._id
                        var pos = $(canvas).offset();
                        var s = arbor.Point(e.pageX-pos.left, e.pageY-pos.top)
                        
                        if (!nearest) return
                        if (dragged !== null && dragged.node !== null){
                            var p = sys.fromScreen(s)
                            dragged.node.p = p
                        }
                        
                        return false
                    },
                    dropped:function(e){
                        if (dragged===null || dragged.node===undefined) return
                        if (dragged.node !== null) dragged.node.fixed = false
                        dragged.node.tempMass = 1000
                        dragged = null;
                        // selected = null
                        $(canvas).unbind('mousemove', handler.dragged)
                        $(window).unbind('mouseup', handler.dropped)
                        $(canvas).bind('mousemove', handler.moved);
                        _mouseP = null
                        return false
                    }  
                }
                
                $(canvas).mousedown(handler.clicked);
                $(canvas).mousemove(handler.moved);                
            }
        }
        
        return that
    }
    
    $(document).ready(function(){
        var CLR = {
            home:"#f44f00",
            branch:"#1a1a1a",
        }
        
        var theUI = {
            nodes:{
                "FIKom.UP":{color:CLR.home, shape:"dot", alpha:1, radius:30, mass: 0.8, link:'#home', 'image': '/media/source/fikomup_logo_white.png', 'image_w':150, 'image_h':150}, 
                Sitemap:{color:CLR.branch, shape:"dot", alpha:1, mass: 0.8, link:'/#'}, 
                Admission:{color:CLR.branch, shape:"dot", alpha:1, mass: 0.8, link:'/#'}, 
                Course:{color:CLR.branch, shape:"dot", alpha:1, mass: 0.8, link:'/#'},
                Headline:{color:CLR.branch, shape:"dot", alpha:1, mass: 0.8, link:'#headline'},
                "About Us":{color:CLR.branch, shape:"dot", alpha:1, mass: 0.8, link:'#about_us'},
                Publications:{color:CLR.branch, shape:"dot", alpha:1, mass: 0.8, link:'#publications'},
                Events:{color:CLR.branch, shape:"dot", alpha:1, mass: 0.8, link:'#events'},
                "Social Media":{color:CLR.branch, shape:"dot", alpha:1, mass: 0.8, link:'/social_media'},
            },
            edges:{
                "FIKom.UP":{
                    Sitemap:{length:.3},
                    Admission:{length:.3},
                    Course:{length:.3},
                    Course:{length:.3},
                    Headline:{length:.3},
                    Publications:{length:.3},
                    Events:{length:.3},
                    "About Us":{length:.3},
                    "Social Media":{length:.3},
                }
            }
        }
        
        var sys = arbor.ParticleSystem()
        sys.parameters({stiffness:400, repulsion:100, gravity:true, fps:60, friction: 0.1})
        sys.renderer = Renderer("#sitemap")
        sys.graft(theUI)
    })
})(this.jQuery)
</script>

<style>
canvas.linkable{
    cursor: pointer;
}

.arbor.page_section {
    padding: 0;
    position: absolute;
    top: 6%;
}

@media only screen and (max-width: 768px) {
    .arbor.page_section {
        padding: 0;
        position: absolute;
        top: 4%;
    }
}
</style>