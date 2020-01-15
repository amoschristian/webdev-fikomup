-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jun 2016 pada 17.28
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmsku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id_artikel` int(10) NOT NULL,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `kategori` int(5) NOT NULL,
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `hits` int(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `judul_seo`, `isi`, `gambar`, `hari`, `tanggal`, `jam`, `id_user`, `kategori`, `tag`, `hits`) VALUES
(7, 'THE FIRST DRUNK DRIVING ARREST HAPPENED EARLIER THAN YOUD GUESS', 'the-first-drunk-driving-arrest-happened-earlier-than-youd-guess', '<p>Hopefully you haven&rsquo;t yet, nor will you ever, experience the terrifying indignity of a drunk driving arrest. Ideally, you&rsquo;ve been a morally upright and responsible American imbiber, availing yourself of a designated driver, ubiquitous Uber, or otherwise making plans for a sober ride home. Given the steep implications&mdash;both moral and financial&mdash;driving under the influence is entirely and obviously not worth, well, whatever you think you&rsquo;ll gain from doing it. (There&rsquo;s nothing convenient about an arrest record; ask around.)</p>\r\n<p>Despite all obvious, if generally unspoken, deterrents, there&rsquo;s an infamous history of casually (and not so casually) intoxicated driving in this country and abroad. In fact, there&rsquo;s actually over a century&rsquo;s worth of drunk driving arrests to date, starting with an Englishman named George Smith. On September 10<sup>th</sup>, 1897, the 25-year-old cab driver apparently slammed his cab into a building somewhere in London, was arrested, pled guilty, and paid a fine of 25 shillings.</p>', '3898.jpg', 'Minggu', '2016-06-12', '08:05:56', 1, 10, '', 20),
(8, 'How to Take Care of Your Mattress', 'how-to-take-care-of-your-mattress', '<p>By the end of an average year, you&rsquo;ll have spent nearly 3,000 hours lying on your mattress, so it pays to take good care of what is typically an expensive purchase. A well-chosen, well-cared for mattress is crucial to your health &ndash; it keeps your spine properly aligned, your body well supported and your sleep blissful and <a href="http://bedroom.about.com/od/SleepandHealth/tp/8-Reasons-Why-Youre-Not-Sleeping-Well-and-What-to-Do-About-Them.htm" data-component="link" data-source="inlineLink" data-type="internalLink" data-ordinal="1">uninterrupted by aches or pains</a>. Still, many people ruin their mattress long before its time by making the following nine mistakes.</p>\r\n<div id="adsense1" class="adsense-slot adsense ads-half">\r\n<div class="label"><a class="muted" href="http://bedroom.about.com/od/All-About-Mattresses/fl/How-to-Take-Care-of-Your-Mattress.htm" data-component="flexArticle" data-source="flexArticle" data-type="adsLabel" data-ordinal="1">Ads</a></div>\r\n<div class="adsense-group">\r\n<div class="adsense-title"><a title="Semudah Mengedit Dokumen DenganGoogle Sites. Gratis 30 Hari!" href="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=Cq2up4GOfVq3WJ8OLvgSDg6vACtTCrqcIpLKWi7ICwI23ARABIJ_92CAoAmDp2uODkA6gAdSx-t0DyAEBqAMBqgSoAU_Q0F_JcxbLxI72kHKe09TvPR9yWLxRAjHp2svrGI_ht97JjSDy1zVWskiUfWo3M1V3OJoIyDTN6YsEWX-lCO8yDoJdGLu_1_NPdYqm63nP4DmVaRWpLW0aYKouQgL5SGZlu5SXSZXiO-Gadd8dB5itfNJ79gUUQ6EQaIRr9irPyFKdkO3jX1P-kkFUrRra9QTptB11afkWuQpgC9iU9O3WZPXbuwakbYgGAYAHlM6FIqgHpr4b2AcB2BMI&amp;num=1&amp;cid=5Gjam6JtRR3KQDr_aUqHteSd&amp;sig=AOD64_0QHGhhI-27_0Jatcvfe8v0lCtT4w&amp;client=ca-aj-about-premium&amp;adurl=https://ad.doubleclick.net/ddm/clk/287535770%3B114542329%3Bk" target="_blank">Buat Situs Web Bisnis</a></div>\r\n<div class="adsense-url"><a title="Semudah Mengedit Dokumen DenganGoogle Sites. Gratis 30 Hari!" href="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=Cq2up4GOfVq3WJ8OLvgSDg6vACtTCrqcIpLKWi7ICwI23ARABIJ_92CAoAmDp2uODkA6gAdSx-t0DyAEBqAMBqgSoAU_Q0F_JcxbLxI72kHKe09TvPR9yWLxRAjHp2svrGI_ht97JjSDy1zVWskiUfWo3M1V3OJoIyDTN6YsEWX-lCO8yDoJdGLu_1_NPdYqm63nP4DmVaRWpLW0aYKouQgL5SGZlu5SXSZXiO-Gadd8dB5itfNJ79gUUQ6EQaIRr9irPyFKdkO3jX1P-kkFUrRra9QTptB11afkWuQpgC9iU9O3WZPXbuwakbYgGAYAHlM6FIqgHpr4b2AcB2BMI&amp;num=1&amp;cid=5Gjam6JtRR3KQDr_aUqHteSd&amp;sig=AOD64_0QHGhhI-27_0Jatcvfe8v0lCtT4w&amp;client=ca-aj-about-premium&amp;adurl=https://ad.doubleclick.net/ddm/clk/287535770%3B114542329%3Bk" target="_blank">apps.google.com/sites</a></div>\r\n<div class="adsense-desc">Semudah Mengedit Dokumen Dengan Google Sites. Gratis 30 Hari!</div>\r\n</div>\r\n</div>\r\n<div id="radlinks3" class="radlinks ads-half" data-num-links="5" data-character-limit="null" data-display-label="false" data-display-inline="true">\r\n<ul>\r\n<li><a href="http://bedroom.about.com/z/js/o.htm?k=mattress&amp;SUName=bedroom&amp;d=Mattress&amp;r=http%3A%2F%2Fbedroom.about.com%2Fod%2FAll-About-Mattresses%2Ffl%2FHow-to-Take-Care-of-Your-Mattress.htm" target="_top">Mattress</a></li>\r\n<li><a href="http://bedroom.about.com/z/js/o.htm?k=king%20koil%20mattress&amp;SUName=bedroom&amp;d=King%20Koil%20Mattress&amp;r=http%3A%2F%2Fbedroom.about.com%2Fod%2FAll-About-Mattresses%2Ffl%2FHow-to-Take-Care-of-Your-Mattress.htm" target="_top">King Koil Mattress</a></li>\r\n<li><a href="http://bedroom.about.com/z/js/o.htm?k=pillow%20top%20mattress&amp;SUName=bedroom&amp;d=Pillow%20Top%20Mattress&amp;r=http%3A%2F%2Fbedroom.about.com%2Fod%2FAll-About-Mattresses%2Ffl%2FHow-to-Take-Care-of-Your-Mattress.htm" target="_top">Pillow Top Mattress</a></li>\r\n<li><a href="http://bedroom.about.com/z/js/o.htm?k=bed%20bug%20mattress%20liners&amp;SUName=bedroom&amp;d=Bed%20Bug%20Mattress%20Liners&amp;r=http%3A%2F%2Fbedroom.about.com%2Fod%2FAll-About-Mattresses%2Ffl%2FHow-to-Take-Care-of-Your-Mattress.htm" target="_top">Bed Bug Mattress Liners</a></li>\r\n<li><a href="http://bedroom.about.com/z/js/o.htm?k=the%20best%20bed&amp;SUName=bedroom&amp;d=The%20Best%20Bed&amp;r=http%3A%2F%2Fbedroom.about.com%2Fod%2FAll-About-Mattresses%2Ffl%2FHow-to-Take-Care-of-Your-Mattress.htm" target="_top">The Best Bed</a></li>\r\n</ul>\r\n</div>\r\n<h3>Never Rotating the Mattress</h3>\r\n<p>The days when you needed to periodically flip a mattress over are long gone, as mattresses from the past decade or so no longer have double-sided springs. But that doesn&rsquo;t mean you are free and clear once the delivery guys set up a new mattress in your bedroom. Make it a habit to rotate your mattress top to bottom at least every other month, and you&rsquo;ll delay the inevitable appearance of valleys and sags due to body weight.</p>\r\n<div id="inArticleVideo" class="component-loaded" data-defer="onPageLoad">&nbsp;</div>\r\n<h3>Not Using a Mattress Pad</h3>\r\n<p>If you don&rsquo;t cover your mattress with a protective pad, you&rsquo;re leaving it defenseless against its mortal enemies: moisture, skin flakes, dust and body oils. Still, this is one of the most common ways people ruin their mattresses. If you&rsquo;re avoiding a mattress pad because you remember the hot, crinkly, plastic covers from decades past, you&rsquo;ll be pleased to discover that today&rsquo;s numbers are far more comfortable and breathable, and many are thickly padded for extra comfort and <a href="http://bedroom.about.com/od/Do-It-YourselfSolutions/fl/Tips-for-Allergy-Proofing-the-Bedroom.htm" data-component="link" data-source="inlineLink" data-type="internalLink" data-ordinal="2">are dust-mite resistant</a>. Wash your mattress pad at least two or three times per year to keep it fresh.</p>\r\n<h3>Jumping on the Bed</h3>\r\n<p>Whether it&rsquo;s your kids using the bed as a trampoline, or you guilty of standing on your mattress to reach a shelf or hang a picture, the strain is too much for your bedsprings to bear.</p>\r\n<div id="adsense2" class="adsense-slot adsense ads-half">&nbsp;</div>\r\n<p class="cb-split">And if you have a platform bed, standing or jumping on the mattress is an even bigger no-no; the wooden supports might break, sending the mattress and you to the floor.</p>\r\n<h3>Not Bothering with a Bed Skirt</h3>\r\n<p>Sure, dust ruffles are mostly decorative and an excellent way to <a href="http://bedroom.about.com/od/GeneralDecoratingTips/fl/Accessories-Every-Bedroom-Needs.htm" data-component="link" data-source="inlineLink" data-type="internalLink" data-ordinal="3">add a splash of style</a> to your space &ndash; just choose one that matches an accent color in your bedding or room.</p>\r\n<p class="cb-split">But beyond that, the hanging fabric helps keep dust, pet hair and general grime from migrating under your bed, where it tends to build up not only as dust bunnies, but also as a potent source of allergens. So whether you prefer a ruffled bed skirt or a more tailored design, if you have a mattress sitting on a foundation, a dust ruffle will help protect the underside of your mattress. Wash the bed skirt at least once a year to remove accumulated dust and hair.</p>', 'jumping-on-bed.jpg', 'Minggu', '2016-06-12', '08:05:01', 1, 10, '', 38),
(9, 'Make Your Kitchen An Allergy Free Zone for Your Kids', 'make-your-kitchen-an-allergy-free-zone-for-your-kids', '<p>While some families might opt to remove all from their home, this may not be the best solution for you.&nbsp; Perhaps you have kids with multiple food allergies, or kids with different nutritional needs, or maybe you just feel that removing all the allergens is not for you. (That is ok, don&rsquo;t sweat it, do what works best for your family.)&nbsp; In any case, there are several precautions you can take to create an allergy free zone in your kitchen.</p>', 'GettyImages-107865267.jpg', 'Minggu', '2016-06-12', '08:04:25', 1, 8, '', 142),
(10, 'Quit Smoking 101', 'quit-smoking-101', '<p>Recovery from nicotine addiction is a process. It doesn''t happen overnight, but it doesn''t take forever either. The more you understand about recovery, the better able you''ll be to navigate your way through the challenges that come with it.<br /><br />The 10 lessons linked below are geared toward providing you with a solid foundation for quitting tobacco successfully.<br /><br />You''ll learn what you need to know to prepare for your quit date, and you''ll receive information about the various quit smoking aids available on the market today.</p>', 'stubbedout1.jpg', 'Minggu', '2016-06-12', '08:06:09', 1, 10, '', 5),
(12, 'Yankees right to name Aroldis Chapman as closer?', 'yankees-right-to-name-aroldis-chapman-as-closer', '<p>With newly-acquired flamethrower Aroldis Chapman, 2015 reliever of the year Andrew Miller and two-time All-Star setup man Dellin Betances the New York Yankees should have a monster bullpen in 2016. Provided, of course, that Chapman isn''t suspended by MLB for his involvement in a domestic dispute.</p>\r\n<p>Which member of the talented trio should close? There won''t be a debate or a competition this spring. Manager Joe Girardi recently announced that <a href="http://blog.northjersey.com/yankees/9799/girardi-chapman-is-my-closer/" rel="nofollow" data-component="link" data-source="inlineLink" data-type="externalLink" data-ordinal="1">Chapman will handle the ninth inning</a>.</p>\r\n<div id="adsense1" class="adsense-slot adsense ads-inf col col-4">\r\n<div class="label"><a class="muted" href="http://nyyankees.about.com/od/Yankees-News-And-Rumors/fl/Yankees-right-to-name-Aroldis-Chapman-as-closer.htm" data-component="infiniteScroll" data-source="infiniteScroll" data-type="adsLabel" data-ordinal="1">Ads</a></div>\r\n<div class="adsense-group">\r\n<div class="adsense-title"><a title="There Are 5 Stages of Addiction.See Where You Are and How to Quit." href="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=Cc8woyGufVpKmDJSvvASK9IyQApy3jaII1JK_jrIBpKPtdhABIJ_92CAoBmDp2uODkA6gAezfzNcDyAEBqAMBqgTDAU_QD0RcG61pwm-3CQIFFNsG0MNBU-1p59XPwb3OdvdC91l_n0kK7Jzf8VuAt7VOOWKFjKuwAkcQYeKfXimDF72Vq9T3lz8jRZMYDRVf3NVykD9IMZcF12Q6n3GcaT7p9lb1Jxn4H5cjjzORyDCs4StGBlc-hPQ7gXzTqWYKad_iuIKL1oCwG59wenTAUIcWYC0XUDUjLMxgmNViAl3pSHr8xpiQ6b9Sdft3gGFX1GuCjYGDU-RHaIbR7dtrm7NNHLLG7IgGAYAH_J-zKKgHpr4b2AcB2BMI&amp;num=1&amp;cid=5GgfFQSz_VyeX4UFxhfaO7Ma&amp;sig=AOD64_3vwvWscdBDfBP6vm_vW7CQXtMTgQ&amp;client=ca-aj-about-premium&amp;adurl=http://www.everystudent.com/wires/toxic.html" target="_blank">Can''t Stop Watching Porn?</a></div>\r\n<div class="adsense-url"><a title="There Are 5 Stages of Addiction.See Where You Are and How to Quit." href="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=Cc8woyGufVpKmDJSvvASK9IyQApy3jaII1JK_jrIBpKPtdhABIJ_92CAoBmDp2uODkA6gAezfzNcDyAEBqAMBqgTDAU_QD0RcG61pwm-3CQIFFNsG0MNBU-1p59XPwb3OdvdC91l_n0kK7Jzf8VuAt7VOOWKFjKuwAkcQYeKfXimDF72Vq9T3lz8jRZMYDRVf3NVykD9IMZcF12Q6n3GcaT7p9lb1Jxn4H5cjjzORyDCs4StGBlc-hPQ7gXzTqWYKad_iuIKL1oCwG59wenTAUIcWYC0XUDUjLMxgmNViAl3pSHr8xpiQ6b9Sdft3gGFX1GuCjYGDU-RHaIbR7dtrm7NNHLLG7IgGAYAH_J-zKKgHpr4b2AcB2BMI&amp;num=1&amp;cid=5GgfFQSz_VyeX4UFxhfaO7Ma&amp;sig=AOD64_3vwvWscdBDfBP6vm_vW7CQXtMTgQ&amp;client=ca-aj-about-premium&amp;adurl=http://www.everystudent.com/wires/toxic.html" target="_blank">everystudent.com</a></div>\r\n<div class="adsense-desc">There Are 5 Stages of Addiction. See Where You Are and How to Quit.</div>\r\n</div>\r\n<div class="adsense-group">\r\n<div class="adsense-title"><a title="Convert Any File to a PDF.Get the Free From Doc to Pdf App!" href="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=CbDtcyGufVpKmDJSvvASK9IyQArX0wYsHxeTTjI4Czo314SUQAiCf_dggKAZg6drjg5AOoAG7i6HjA8gBAagDAaoEwwFP0A9EXBuvacJvtwkCBRTbBtDDQVPtaefVz8G9znb3QvdZf59JCuyc3_FbgLe1TjlihYyrsAJHEGHin14pgxe9lavU95c_I0WTGA0VX9zVcpA_SDGXBddkOp9xnGk-6fZW9ScZ-B-XI48zkcgwrOErRgZXPoT0O4F806lmCmnf4riCi9aAsBufcHp0wFCHbmMtV1A1Iyz9cIrSYgJd6Uh6_MaYkOm_UnX7d4BhV9Rrgo2Bg1PkR2iG0e3ba5uzTV2KsNaIBgGAB6303hyoB6a-G9gHAdgTCA&amp;num=3&amp;cid=5GgfFQSz_VyeX4UFxhfaO7Ma&amp;sig=AOD64_09r4bRpY0g78YZBbrWKYlHccxuUw&amp;client=ca-aj-about-premium&amp;adurl=http://4055.xg4ken.com/trk/v1%3Fprof%3D470%26camp%3D1666%26affcode%3Dcr671836%26kct%3Dgoogle%26kchid%3D4233715058%26cid%3D72428273365%7C201336%7C%26mType%3D%26networkType%3Dcontent%26kdv%3Dc%26criteriaid%3Dkwd-51654110%26adgroupid%3D4732233565%26campaignid%3D97934005%26locphy%3D1007738%26adpos%3Dnone%26url%3Dhttp://download.fromdoctopdf.com/index.jhtml%3Fpartner%3DY6xdm007" target="_blank">Start Download</a></div>\r\n<div class="adsense-url"><a title="Convert Any File to a PDF.Get the Free From Doc to Pdf App!" href="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=CbDtcyGufVpKmDJSvvASK9IyQArX0wYsHxeTTjI4Czo314SUQAiCf_dggKAZg6drjg5AOoAG7i6HjA8gBAagDAaoEwwFP0A9EXBuvacJvtwkCBRTbBtDDQVPtaefVz8G9znb3QvdZf59JCuyc3_FbgLe1TjlihYyrsAJHEGHin14pgxe9lavU95c_I0WTGA0VX9zVcpA_SDGXBddkOp9xnGk-6fZW9ScZ-B-XI48zkcgwrOErRgZXPoT0O4F806lmCmnf4riCi9aAsBufcHp0wFCHbmMtV1A1Iyz9cIrSYgJd6Uh6_MaYkOm_UnX7d4BhV9Rrgo2Bg1PkR2iG0e3ba5uzTV2KsNaIBgGAB6303hyoB6a-G9gHAdgTCA&amp;num=3&amp;cid=5GgfFQSz_VyeX4UFxhfaO7Ma&amp;sig=AOD64_09r4bRpY0g78YZBbrWKYlHccxuUw&amp;client=ca-aj-about-premium&amp;adurl=http://4055.xg4ken.com/trk/v1%3Fprof%3D470%26camp%3D1666%26affcode%3Dcr671836%26kct%3Dgoogle%26kchid%3D4233715058%26cid%3D72428273365%7C201336%7C%26mType%3D%26networkType%3Dcontent%26kdv%3Dc%26criteriaid%3Dkwd-51654110%26adgroupid%3D4732233565%26campaignid%3D97934005%26locphy%3D1007738%26adpos%3Dnone%26url%3Dhttp://download.fromdoctopdf.com/index.jhtml%3Fpartner%3DY6xdm007" target="_blank">www.fromdoctopdf.com</a></div>\r\n<div class="adsense-desc">Convert Any File to a PDF. Get the Free From Doc to Pdf App!</div>\r\n</div>\r\n<div class="adsense-group">\r\n<div class="adsense-title"><a title="1. Download InternetSpeedTracker&trade;2. Test Your Speed 3. Enjoy!" href="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=C3jJ2yGufVpKmDJSvvASK9IyQAsWmxbwGzYGd6pACwI23ARADIJ_92CAoBmDp2uODkA6gAbuwh84DyAEBqAMBqgTCAU_QP5ZFB5RRcNyldBUFDNQD3sNXDqJq6s_Om_DCdECZml1jn01A-Zye5luYuLBAOXTYw6i9GEZKLO6dHGmIXMutpNH5lyl9JrgKCUsz89877xhQM4oEiy0w3AekZjvn9kCreAL2EIt61ijTiz-g6WMqNUo9jPkh3xL4oHcXZdCh9JDVmI-zB4lnJjLcSRKXY6zVU_zpw7MKDFLZALQCyPsWLS4tFElRcf_z8ZfUVGuSaHeAkyRPlXDS7d1te1WONqxZiAYBgAetz_gxqAemvhvYBwHYEwg&amp;num=4&amp;cid=5GgfFQSz_VyeX4UFxhfaO7Ma&amp;sig=AOD64_0VQ1UNPiTukSYnnzWePpPB0aDkOg&amp;client=ca-aj-about-premium&amp;adurl=http://4055.xg4ken.com/trk/v1%3Fprof%3D516%26camp%3D8182%26affcode%3Dcr3449102%26kct%3Dgoogle%26kchid%3D6689378451%26cid%3D73161460765%7C1769315%7C%26mType%3D%26networkType%3Dcontent%26kdv%3Dc%26criteriaid%3Dkwd-17346740%26adgroupid%3D20511711085%26campaignid%3D186604525%26locphy%3D1007738%26adpos%3Dnone%26url%3Dhttp://free.internetspeedtracker.com/index.jhtml%3Fpartner%3D%5EBBQ%5Exdm151" target="_blank">Start Download</a></div>\r\n<div class="adsense-url"><a title="1. Download InternetSpeedTracker&trade;2. Test Your Speed 3. Enjoy!" href="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=C3jJ2yGufVpKmDJSvvASK9IyQAsWmxbwGzYGd6pACwI23ARADIJ_92CAoBmDp2uODkA6gAbuwh84DyAEBqAMBqgTCAU_QP5ZFB5RRcNyldBUFDNQD3sNXDqJq6s_Om_DCdECZml1jn01A-Zye5luYuLBAOXTYw6i9GEZKLO6dHGmIXMutpNH5lyl9JrgKCUsz89877xhQM4oEiy0w3AekZjvn9kCreAL2EIt61ijTiz-g6WMqNUo9jPkh3xL4oHcXZdCh9JDVmI-zB4lnJjLcSRKXY6zVU_zpw7MKDFLZALQCyPsWLS4tFElRcf_z8ZfUVGuSaHeAkyRPlXDS7d1te1WONqxZiAYBgAetz_gxqAemvhvYBwHYEwg&amp;num=4&amp;cid=5GgfFQSz_VyeX4UFxhfaO7Ma&amp;sig=AOD64_0VQ1UNPiTukSYnnzWePpPB0aDkOg&amp;client=ca-aj-about-premium&amp;adurl=http://4055.xg4ken.com/trk/v1%3Fprof%3D516%26camp%3D8182%26affcode%3Dcr3449102%26kct%3Dgoogle%26kchid%3D6689378451%26cid%3D73161460765%7C1769315%7C%26mType%3D%26networkType%3Dcontent%26kdv%3Dc%26criteriaid%3Dkwd-17346740%26adgroupid%3D20511711085%26campaignid%3D186604525%26locphy%3D1007738%26adpos%3Dnone%26url%3Dhttp://free.internetspeedtracker.com/index.jhtml%3Fpartner%3D%5EBBQ%5Exdm151" target="_blank">www.internetspeedtracker.com</a></div>\r\n<div class="adsense-desc">1. Download InternetSpeedTracker&trade; 2. Test Your Speed 3. Enjoy!</div>\r\n</div>\r\n</div>\r\n<div id="radlinks3" class="radlinks ads-inf col col-4" data-num-links="5" data-character-limit="null" data-display-label="false" data-display-inline="true">\r\n<ul>\r\n<li><a href="http://nyyankees.about.com/z/js/o.htm?k=baseball%20team%20training&amp;SUName=nyyankees&amp;d=Baseball%20Team%20Training&amp;r=http%3A%2F%2Fnyyankees.about.com%2Fod%2FYankees-News-And-Rumors%2Ffl%2FYankees-right-to-name-Aroldis-Chapman-as-closer.htm" target="_top">Baseball Team Training</a></li>\r\n<li><a href="http://nyyankees.about.com/z/js/o.htm?k=yankees&amp;SUName=nyyankees&amp;d=Yankees&amp;r=http%3A%2F%2Fnyyankees.about.com%2Fod%2FYankees-News-And-Rumors%2Ffl%2FYankees-right-to-name-Aroldis-Chapman-as-closer.htm" target="_top">Yankees</a></li>\r\n<li><a href="http://nyyankees.about.com/z/js/o.htm?k=lineup%20chart&amp;SUName=nyyankees&amp;d=Lineup%20Chart&amp;r=http%3A%2F%2Fnyyankees.about.com%2Fod%2FYankees-News-And-Rumors%2Ffl%2FYankees-right-to-name-Aroldis-Chapman-as-closer.htm" target="_top">Lineup Chart</a></li>\r\n<li><a href="http://nyyankees.about.com/z/js/o.htm?k=new%20york%20yankees&amp;SUName=nyyankees&amp;d=New%20York%20Yankees&amp;r=http%3A%2F%2Fnyyankees.about.com%2Fod%2FYankees-News-And-Rumors%2Ffl%2FYankees-right-to-name-Aroldis-Chapman-as-closer.htm" target="_top">New York Yankees</a></li>\r\n<li><a href="http://nyyankees.about.com/z/js/o.htm?k=reds&amp;SUName=nyyankees&amp;d=Reds&amp;r=http%3A%2F%2Fnyyankees.about.com%2Fod%2FYankees-News-And-Rumors%2Ffl%2FYankees-right-to-name-Aroldis-Chapman-as-closer.htm" target="_top">Reds</a></li>\r\n</ul>\r\n</div>\r\n<blockquote>\r\n<p>&ldquo;I think we&rsquo;ll go into spring training with Chapman as our closer and kind of use those other guys to do the seventh and the eighth,&rdquo; manager Joe Girardi said Monday on the YES Network&rsquo;s &lsquo;Yankees Hot Stove&rsquo; program.</p>\r\n</blockquote>', 'Xhoth009.jpg', 'Minggu', '2016-06-12', '08:03:06', 1, 5, '', 104),
(14, 'While some families might opt ', 'while-some-families-might-opt-', '<p>While some families might opt to remove all from their home, this may not be the best solution for you.&nbsp; Perhaps you have kids with multiple food allergies, or kids with different nutritional needs, or maybe you just feel that removing all the allergens is not for you. (That is ok, don&rsquo;t sweat it, do what works best for your family.)&nbsp; In any case, there are several precautions you can take to create an allergy free zone in your kitchen.</p>', 'sapi.jpg', 'Minggu', '2016-06-12', '08:02:37', 1, 5, '', 79);

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE IF NOT EXISTS `halaman` (
`id_halaman` int(10) NOT NULL,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `id_modul` int(5) NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` int(5) NOT NULL,
  `hits` int(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `judul`, `judul_seo`, `isi`, `id_modul`, `gambar`, `hari`, `tanggal`, `jam`, `id_user`, `hits`) VALUES
(2, 'About Us', 'about-us', '<p>This is about us</p>', 0, '2.jpg', 'Minggu', '2016-06-12', '08:09:16', 1, 0),
(3, 'Advertise', 'advertise', '', 0, '', 'Jumat', '2016-01-22', '14:32:18', 1, 0),
(4, 'FAQ', 'faq', '', 0, '', 'Jumat', '2016-01-22', '14:32:29', 1, 0),
(9, 'Galeri Foto', 'galeri-foto', '', 20, '', 'Jumat', '2016-06-03', '07:59:21', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(5) NOT NULL,
  `kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `kategori_seo`) VALUES
(5, 'Movie', 'movie'),
(8, 'Entertainment', 'entertainment'),
(9, 'How To', 'how-to'),
(10, 'Health', 'health'),
(11, 'Science', 'science'),
(12, 'Technology', 'technology'),
(13, 'Relationship', 'relationship'),
(14, 'Business', 'business');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id_komentar` int(10) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `komentar` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_artikel` int(10) NOT NULL,
  `dibaca` enum('N','Y') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nama`, `email`, `komentar`, `tanggal`, `id_artikel`, `dibaca`) VALUES
(5, 'Nabil', 'nabil@gmail.com', 'Wah, ini baru artikel yang bermanfaat.', '2016-01-23', 12, 'Y'),
(6, 'Rohi', 'rohi.abdulloh@gmail.com', 'Keren bro', '2016-01-23', 5, 'Y'),
(7, 'Rohi', 'rohy_smart@ymail.com', '<p>Bagus bung</p>', '2016-04-30', 5, 'Y'),
(8, 'Daffa Shidqi', 'daffa@gmail.com', 'Sip.', '2016-01-24', 6, 'Y'),
(9, 'oke', 'sip@gmail.com', 'Komentar bro', '2016-01-25', 6, 'Y'),
(10, 'Alfat', 'alfat@gmail.com', 'Komentar dong', '2016-01-26', 7, 'N'),
(11, 'Nabil', 'nabil@gmail.com', 'aku komentar juga', '2016-01-26', 7, 'N'),
(12, 'Alfat', 'alfat@gmail.com', 'komentar dong', '2016-01-26', 11, 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `md_galeri_foto`
--

CREATE TABLE IF NOT EXISTS `md_galeri_foto` (
`id_galeri` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `md_galeri_foto`
--

INSERT INTO `md_galeri_foto` (`id_galeri`, `judul`, `gambar`, `tanggal`) VALUES
(1, 'Kegiatan MOS', 'Xhoth009.jpg', '2016-06-03'),
(2, 'Hewan Kurban', 'sapi.jpg', '2016-06-03'),
(3, 'Lomba Robotik', '_MG_5528.JPG', '2016-06-03'),
(4, 'Lomba Web Design', 'IMG_4131.JPG', '2016-06-03'),
(5, 'Foto Bersama Peserta Lomba', '_MG_5579.JPG', '2016-06-03'),
(6, 'Lomba Graphic Design', 'IMG_4146.JPG', '2016-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id_menu` int(5) NOT NULL,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_menu` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jenis_link` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `induk` int(5) NOT NULL,
  `urut` int(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=37 ;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `judul`, `kategori_menu`, `jenis_link`, `link`, `induk`, `urut`) VALUES
(33, 'Movie', 'main', 'kategori', '5', 32, 1),
(34, 'Entertainment', 'main', 'kategori', '8', 32, 2),
(6, 'Contoh menu sidebar', '4', 'halaman', '1', 0, 1),
(7, 'Contoh lagi', '4', 'kategori', '1', 0, 1),
(36, 'Galeri', 'main', 'halaman', '9', 0, 5),
(35, 'Health', 'main', 'kategori', '10', 32, 3),
(31, 'About Us', 'main', 'halaman', '2', 0, 3),
(32, 'Berita', 'main', 'url', '#', 0, 4),
(29, 'Home', 'main', 'url', 'http://localhost/cmsku', 0, 1),
(18, 'About Us', 'secondary', 'halaman', '2', 0, 1),
(19, 'Advertise', 'secondary', 'halaman', '3', 0, 0),
(20, 'FAQ', 'secondary', 'halaman', '4', 0, 3),
(21, 'Help', 'secondary', 'halaman', '5', 0, 6),
(22, 'Privacy Policy', 'secondary', 'halaman', '6', 0, 5),
(23, 'Term of Use', 'secondary', 'halaman', '7', 0, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
`id_modul` int(5) NOT NULL,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `menu` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  `konten` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  `widget` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `judul`, `folder`, `menu`, `konten`, `widget`, `aktif`) VALUES
(20, 'Galeri Foto', 'galeri_foto', 'Y', 'Y', 'N', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
`id_setting` int(5) NOT NULL,
  `parameter` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nilai` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_setting`, `parameter`, `nilai`) VALUES
(1, 'judul', 'SMK Cinta Bangsa'),
(2, 'deskripsi', 'Mendidik Siswa Berprestasi dan Berbudi Pekerti'),
(3, 'url', 'http://localhost/cmsku'),
(4, 'ikon', 'favicon.jpg'),
(5, 'keyword', 'business, movie, music, health'),
(6, 'folder', '/cmsku'),
(7, 'homepage', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`id_tag` int(5) NOT NULL,
  `tag` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `tag`
--

INSERT INTO `tag` (`id_tag`, `tag`, `tag_seo`) VALUES
(5, 'Movie', 'movie'),
(8, 'Entertainment', 'entertainment'),
(9, 'How To', 'how-to'),
(10, 'Health', 'health'),
(11, 'Science', 'science'),
(12, 'Technology', 'technology'),
(13, 'Relationship', 'relationship'),
(14, 'Business', 'business');

-- --------------------------------------------------------

--
-- Struktur dari tabel `template`
--

CREATE TABLE IF NOT EXISTS `template` (
`id_template` int(5) NOT NULL,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `template`
--

INSERT INTO `template` (`id_template`, `judul`, `folder`, `aktif`) VALUES
(9, 'Web Sekolah', 'web_sekolah', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(5) NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'rohi.abdulloh@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Author', 'author@gmail.com', 'author', '02bd92faa38aaa6cc0ea75e59937a1ef', 'author');

-- --------------------------------------------------------

--
-- Struktur dari tabel `widget`
--

CREATE TABLE IF NOT EXISTS `widget` (
`id_widget` int(5) NOT NULL,
  `judul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tipe` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `konten` text COLLATE latin1_general_ci NOT NULL,
  `posisi` int(2) NOT NULL,
  `urut` int(2) NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `widget`
--

INSERT INTO `widget` (`id_widget`, `judul`, `tipe`, `konten`, `posisi`, `urut`, `aktif`) VALUES
(3, 'Trending News', 'terbaru', '', 1, 2, 'Y'),
(14, 'Category', 'kategori', '', 1, 3, 'Y'),
(13, 'Popular News', 'populer', '', 1, 1, 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
 ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `md_galeri_foto`
--
ALTER TABLE `md_galeri_foto`
 ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
 ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
 ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
 ADD PRIMARY KEY (`id_template`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `widget`
--
ALTER TABLE `widget`
 ADD PRIMARY KEY (`id_widget`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id_artikel` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
MODIFY `id_halaman` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `md_galeri_foto`
--
ALTER TABLE `md_galeri_foto`
MODIFY `id_galeri` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
MODIFY `id_setting` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
MODIFY `id_template` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `widget`
--
ALTER TABLE `widget`
MODIFY `id_widget` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
