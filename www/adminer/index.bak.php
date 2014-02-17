<?php
/** Adminer - Compact database management
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.0.0
*/error_reporting(6135);$Gc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Gc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$wh=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($wh)$$X=$wh;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃşÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ıÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒŞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Şn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1Ìs˜´ç-4™‡fÓ	ÈÎi7†³é†„ŒFÃ©”vt2‚Ó!–r0Ïãã£t~½U'3M€ÉW„B¦'cÍPÂ:6T\rc£A¾zr_îWK¶\r-¼VNFS%~Ãc²Ùí&›\\^ÊrÀ›­æu‚ÅÃôÙ‹4'7k¶è¯ÂãQÔæhš'g\rFB\ryT7SS¥PĞ1=Ç¤cIèÊ:d”ºm>£S8L†Jœt.M¢Š	Ï‹`'C¡¼ÛĞ889¤È QØıŒî2#8Ğ­£’˜6mú²†ğjˆ¢h«<…Œ°«Œ9/ë˜ç:Jê)Ê‚¤\0d>!\0Z‡ˆvì»në¾ğ¼o(Úó¥ÉkÔ7½sàù>Œî†!ĞR\"*nSı\0@P\"Áè’(‹#[¶¥£@g¹oü­’znş9k¤8†nš™ª1´I*ˆô=Ín²¤ª¸è0«c(ö;¾Ã Ğè!°üë*cì÷>Î¬E7DñLJ© 1ÊJ=ÓÚŞ1L‚û?Ğs=#`Ê3\$4ì€úÈuÈ±ÌÎzGÑC YAt«?;×QÒk&ÇïYP¿uèåÇ¯}UaHV%G;ƒs¼”<A\0\\¼ÔPÑ\\Âœ&ÂªóV¦ğ\n£SUÃtíÅÇrŒêˆÆ2¤	l^íZ6˜ej…Á­³A·dó[İsÕ¶ˆJP”ªÊóˆÒŒŠ8è=»ƒ˜à6#Ë‚74*óŸ¨#eÈÀŞ!Õ7{Æ6“¿<oÍCª9v[–MôÅ-`Óõkö>lÙÚ´‹åIªƒHÚ3xú€›äw0t6¾Ã%MR%³½jhÚB˜<´\0ÉAQ<P<:šãu/¤;\\> Ë-¹„ÊˆÍÁQH\nv¡L+vÖÃ¦ì<ï\rèåvàöî¹\\* àÉçÓ´İ¢gŒnË©¸¹TĞ©2P•\r¨øß‹\"+z 8£ ¶:#€ÊèÃÎ2‹ºJ[i—‚£¨;z˜ûÑô¡rÊ3#¨Ù‰ :ãní\rã½ƒeÙpdİİ è2cˆê4²k¿Š£\rG•æE6_²ªÊØŞ‰b‹/Œ«HB%ò0ë¢>ÈÈğhoWÃnxlÖ æµƒCQ^€°ĞÔÿßñ\r„Š¾¶4lK{şZÆü:†ĞÜÃƒŸ.¦p¨§Ä‚éJóB-Å+B”´’×Z§”ùB£ÆTÙ€-S`èÂçÈ[C¹h\ròCˆtá¸d€¯&'øX\n1Ù^`éÅÁraÚyˆÅÔ2Ä—B˜P2c ¸–‘PäıÓã„Ky…†fé”^‰·Â5¾FÊRJk©10 T¡Ãhee\r×Æ(…CrQÌ-SÁºB`\$yn¹?B†T¿Wâ4D9 ¶6jùİ‹é…Ğnˆt[%å‚0 É@\$ûä^VRÉà*bØb*4‚IÇÇÈz{N0Œ\reü¿|	›¢\$Ÿ4Å,Á¬ÊCÈ\$¤ÌË™–e)š®#‡„©`Ò´dı'¡<^ÑÉXƒ ntâØf\"áŒµAuŞÉ\nŠ¿@pŞ\n†#!;Útò8²ˆ´“é¼jŒ»Md³éò:‡TŸÔ\nƒ:%„µæÀğOh\\Trà8N×şQÕ4ì¡\r}A¢zC”\rôIø0ğîåÊ3¨TÇ=˜Æù‰?'´¡/,¬[aÅŒ2­H	8¥ùÔX‹›:À¨í’l·['Ù}‹u¨·£!SLõO+*[‚åcFÛ\0006¡‘lİÆzÃ¨r>äİ¾C²ëÃœƒS´`Ò¡çY)İt6”lÊÈ:¨º¬0¶±™ÂÃ?,ìÖÿéüGŠ®‚%Ãè¡\$Ê€-ŸM…±¾BÈ³†0ÎH#x2c à:ƒÄğŞo\n›Q <†àë\\­Akµep°Y„Û%š\$;ÊL&•%kâûFõõ;Ô`r¶m¤«öá4jËÔq×j‹õÕ”§¬Pc¼EQ†*âcÃf!*\0µéy,ùP`°¨µM\\C½’ŠÖV\"Y{ÑzMªt¡¾øó­d/¥ö@€™_Y§EÎÌ°­Ê8^B½IDW)š¢jÿuAŒ–hHšà_`Ò-<·WšÖ[ØfTîf0*V¤¦O\$®¬.<—@1SàÈÃ”õŠq\"Êû,}sµ6îÖâğws•ÂhQcVÒy˜é¹Š¥™Xd‰kû0Dw¢ÖÈAÇ”¯ØË\"ÈkKEt‚à9Ò£]W-/ÍÆR‰ÊşĞü¶¯9 9Í™†ƒp-¹€ÚÎâšèdØÅ2+ÀµÎ‡ Zm‘Õ,É8ÙG0ÄË®—(ëMNÄÂl´&†+[+•2B–[9>a¦q,¼Ê‘(2EÕ¢µ—:OrM¹ƒ¸²ŞğG¡MÑLZÆN30Ü¼ëÉ{ÖæŠËu2V+ƒööÄk«²›s+×VÁ¶Häğ„iî{\"ƒ½,T(x:9@ØBÌH—2¢œF¢^¦öºpzï|Á8h‹Ü#{‚éöbqé½¡oNgí{Æ îÍÒ.-½Á,g1aÌ¢µn\nøFX…IbMıgbß?õ€ãü‚ceÌãÖo“£}öŠª\\—æ<±…¥ÃÅµ¶üëñÆĞÕ‚y;š¬›ïr`}ÁC[ÍåÉyµÚÀ8l`¤=‚êß¸Ò§\$<{4t«qŠŠu3t¾ vÎBW¥¢»:+µ(F×Ñq?o®É]¸ekìJÍ±tLóCµ2L=¼|ür.ó¢,×Oå™Ÿ€òÍ²é¡ô>õ(M®™5Ã>£İlúX³å»wIŞîeÍÈsÒª‚Ùˆq>(«o‡ÔAøñC!Ù8•‘“ô†ĞÛ-¹8VĞ„Ãú¦ä:Ğ¾Aƒl6¦Ş­~©ù?ß A—ñ}²İû p\rÀ/†GÏü\rÇòşŸƒüßôïŞüãp€ğ\0004Oû\0ìhü-\n¥\0OüşoúÿãDğ\"ş`¾H.“„\0fiŒ€È«C€—ÀŒ”	@ûOãÇ¬\rïûpZ ß\0¯ÙÏş¤xÿ¨¡§`Øğrÿ°xŠ|ƒ0€§€¿ĞwĞlbi8ëŞ‹oÆÿ0-)Z\0r”ğQ\nOé`¾Â›¯éÃ	0{LüÎÊXÏ0³ïé%­\n0Ùğa°¿¦ƒ0ŞûoÿÉÉ\rì‹Pìş‡ºxd0ÂpD++òŠ„«gÚû0 ûdöï¾pp=‘&à- éPu1,h÷/ÉP‡¯·‘AOĞ¼\rˆÀûßĞ5°J®\"è±6˜‘Ñ{QGĞñ-Ñ…‚qÑSJâúæ1)x«1fLĞ×/ú\0Û±\"Œ\n£\rq5±¿ÃÙ‘¡QSDŠÏ‚Á—1WqqZŒHF.‚0àòé9±ÿ\rp™€ó\0àæòCqÏÉ àÊp~ƒ1ø­2ò#!c&i\n \"ù\roÿ’2!@¿\$‘°Á%*xŠ’JÿòO0‚,cñM/è\0Ï%Pá&Pa%²y'Ğõ'Z\r¨ö§’orƒ%r‘(’u%’V5ÀÆ™2W&oÿ*’­'òp°Aä …,qnûf%²ÏÌz&P)ğ-pŠ0\"ÁˆÀ«°à¶ÏÍª“qH‰>–Á‘Å\$\n,Í® ªÒ­c­²47I-áÔ,¬.2a2Põ'²•3OÉ-Î¬ÿ²´š“=2àÈSJjL\nn§2W*Qs/62•%pÜ*ÓXËh°ğ3kSƒğñ4 [6“Œÿós%³‘%°–S“ƒ„)Š“‚Â‰¨öƒ€P;-œ€œıi ­3º\nlìš\n¶#g/Cl»Ã\0000CÓÖGÃŠ‚ï7nŸä:@Ü8bëc:ã';\"?;g*\$¾,³Â.ó<€òTÓÌ/3Ñ1ë¦Ñ¬");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n0›†S‘Øa9œÅS`°Çˆ“Œ&Ó(°Ên0˜†QIî(.‹Äq¨àöO)ŒÆÌ¢ã‘”á1™E#)œŠx8\nâ‚ñğ¸\\9ŠDâ¹„®d+¡ÑÎgÁ%(R,‰BqH®' ‘Gâq.›,2„õÁÙö‚AGCyœÏ#L’S±„ä\nŠL†óÖ8n:ŒæS¡G‡:\$“%æö;—Æ)ÒØ™²Qš´G¢sEèÉØÄö­)“Nn¶MN‡S‘¸@t9L¶Û|1›Íæ³LêTi3›…†C	æ’{¾ßù±é¸Êw0±@¤wÓ™œñ®çƒãíÎ«¼Îw{…ÈJ8\\C(÷É¨ÄZ¦j9´a[ÀŞ -òä;!ƒHÌ<ŠÈ`æß…(äš±	+‚á¸ªÂ2\r£K¬9ğ@å Áè`…‹¼èPPä™0L#±#jô±Ã+ ¡EÉ’Ù£pæ9aèØÂ;mø\\8CzèàŠ€^ò¨]\rÃ°ø\\7C8_Dƒp^ÂP é\0Ì± w &c4^RãN9DÓ\\Ü™Ãjü3ÃÂ@Êä\r8a;Mïl7ƒd<3´cpŞĞ“Àæ:)\\;¯C ĞÑ†ïå!6HT¥,4Oã=Ñ†!pdÇTøÌSs;Éc}&&Œ¨ˆÂÅ„Á5cYÊíp‹1`ÓI£èbKPRtªf2Xé»›F Ã-!\rŒ–icYú„WL\\PŞ®#r'b–]^2İØääCÍ1É(4—&ÉôD¥*JÒÄ<†]Ã:¸è/ÀTô:tÜ¿7áèPaH^?ƒ(ÇsÆs¦0»ĞPQƒá0³ç„÷ô?á‘*—\rØb.Å.ğû™…ƒ2ñfO|fÄ<ìk2L¢…07êä®8øÈ!´£c+6fW#~<I+!-ĞQªâ×H÷:â!\"šèÊ2	5“ø’¶M£m±1+èØİ-±fá³‡»„¶8\\£˜·½nûFÔ<¡ŞÚÚ…ŞÊìò¸èÜ\r#ê…aväİƒàö>…2’1ÁN(Èğ<¶²´ô¨XñtÀ‹†§cŠ•Û:•Úù‚¦®«®'‰ò€¡ÊWÚŒê€RE8ÒØ±›p@š…Ü èÎú5ÚÑ¨À·(8/Ñ§b3ö~\"J;é©Ò)^„=‡dŠv²JÀ¤şäÌ'\rí:ÛÃ¶È§[ íÆ˜ÅƒYvåüÜ×ä÷ŸYæà¶’CLĞ(7a„ÀÎŠ	z¤a­³±ÕÖgƒ2\\\rªô“ÂäBÛ%Q œ.¾øA¡I	\r±-%Îém-Ïe©·\0†ÈÓ/DZ !Pöxƒ H´6`X„b*g4E¬Õ§…\"	PhÄÕiPÂàB\0ı‡ÀÈÁ›œeT†r°YJé\\+ˆ­‚¡ààäĞ:>&-Ÿ#¦€dÚy{IotÄ?CO ß›õ&qñ™\0ædùhGº;‡BÙ	B,\r)Ô4ƒÈíq#\rÁM&°VÄX!“éU·àÒáXô«z!å¤Å0æC’Ë.J964±É	#Œ8àÄ¦‰Ù“3jEÊ×ÿa #Àô	agæ 9ƒ¹1&¤à<l¡µÊÊ)H%4¨cÓH™½#:¥p]Ó°Âéàåy(ƒPraÁ˜,ÛşŸs¾rOˆ[¡Û®.NÔ°Ìø5(a#(Ê=˜É\$xy’\$È¡Q¬w¦üuœ4zr‘ùÏ:WT_(…¤ÁX70IÑH*ŒIè«—§I(1Ÿ%O^ˆ\"0{N'ÌŒ›aÒŒÑ²9GC”—K’e‚†¤êá¸¤²R†©NIh\0‚HŒ-†©äò“i¥§êÀˆÃ¥ciÓ&eCÉ™‚© eêjôÆj~1\r@éıÛÃ6\r‡Š€ÚEÅ\n ó6‡6wg=%H\n¥Óñ:¢ÉÇ5á|'›Uê¢Mê—8²ò†“JPÓUÚú¯”ÕIĞIã<É)„“ZœÙ8:í°d”ğéürşŞÕ!Á¦h.‚-\rÃZ¹ä9B¯Ãz´MÅ®W3tîªs«¨Â—²Á°ÇÇb—LcB íòVBtúC›ßvp.¤Ï[R^oŒ	+x>ù*Ããªv¨Ş9ßrN¥H!4vL1ğğÀßÁmÁ˜:áÜThGƒaŞ\"÷5ƒÛaëğ3ĞBÈ¢Ûˆ«5a­-42bšÑZ¨ÃpnO©şA\rŸ†`Ïlfíœ5Çğä>Õ™¡†[«#®ÍêÜp'Ş\rV\0®Ì/b/¾93ÖC‡Ö=•™às4¡˜:°ÊUè(9.Æ†G3›'Û†ˆ“ÏI©nXvpŸàÿ=X[nAÑ¸7QÒUKÚ‰¤ t¾O²Ó^dtzÔqåhbØ‹,š‹Ç÷ÒU8em¤ª“¢ÓÊ‰5¡ì­ ÉØ¼èk`Ks¦[¶7ßLÊ9y%q¶~¶ÿ#@VÌ¥¨Ö.fUš\$ŒD2f~¥:Ô3’PÄÃ^ŸzkA¶fÌÈ¡âzq¼?ªÛbš¡Œ‰Q2'(™]o%wgšB?´*é«2ÃÜ×OX±{\$ØDÈbf‡øH\n4&0Lƒs\0íHbwØ.à3p@{¼èDË ê8Ó…lW,²!Á['[Ú^1BL]„:‡0¦äTV¶|9Û°ûoy¥ÀjopÅå@P	¨fœğæ¼Ø9	À£¢[ MÓCß@¡˜°î‰‚‰céêìú”¾™×j*-E±y¯PÜºfâıq¦GÃ¨ODNÏ£M@ÃyLeç—©ÖKòø	X¿Ü(0›œRØfÑ &u0è\nü@oñQ +©Ğ¼F\$›ûÄø³åC\"šì ×¬Õ,ÑfHáÜÑ‡eÌ·mÉı¼7w'È‰?¦&~ †z«¢hÃ“Qüè¹7\0‚k‚•Ñ€Šo¯™Yqğhğ¦/dó»î¨F8­9¦}2uóñlÍfS{íâß£÷¡Ê,I¾°‹­]ıòÿ,ˆF›ûBn­¡ÿ[=¢ósIy\$æà©@ä©>´ xn\n¦¤íJ\$°§,ç©òµh¸'tà¶ Z@º€¶ŒÀVâ°€L\"Ù	äp&Ò4àğN úÔé*@òİø£M&¨í*’°\0„ZÔ\r\r+Lµ\rU\$a)åBmˆ¿ğ3p:·P@+0FGğz§'.ë¥?\niò,ä`-cxş/4ó¾‘Fi%dÆ\0Pıkìk«¨/ÆÌÀòVeÌ}êÀÅÚƒ€ò‡ãN4@bg2èÀ]ô> z `Æ¢<PÜSn4úàúöMÀnÚH€ÑfäFÀ\$ğªÆ°ÂêÎ¬LXlîlğR?X¡0ÔJ\rÀšˆÄvp´šk\"ğ€Ü³ô¨j‹¢u\0¸ğË=\0k@Mp°|Ô€Uà_@ÚLKXzqhµñb\$‹j4·C`+Ñ¢s\"Ö­İ@Ë`P²ÆF#à¯\n,¨jø(OÀ‰\0[Q(-ƒ2§p¶RXZ\0íĞd¨úÿññ1‚“±ñªP²1ğ0@Ó-VïËå]\nÈ‚±\0.œn°nbu!Ñ>År\"#D²\rŸ-¢fib4RÔIÎ\$²4ÅL`tÒ0:¢d;ò!ò8ú\näıs&lá\"*ÌFB%\r'´»ƒp‰°êø%‡ş]¢8v°àéÌr]¨ˆ ëÌOkÓ(§š6£ö]¬’–c\$†oö’ªL€óäï€XrG Ê!+Ï*ëĞznêÕ’¾1€\\\rNZ\r\0¨?Œ*±.Š.’û/óugº\"ÚïÀ‡(nøéÒIü‘2Ğ÷±W§Ô|ö’&º¬0S¿í,¾ÓFÂD6ˆrcÒà.€İ0²ï'¨Nsf ÉäÈfdÛ.!5©šHIp—L‰8R|‡+zÃí¬·­«,òÓ+‘2k#4nğÑRé2mX¿\"Rˆ]\0S,,ÂÌlÊÌî5¬8®@ó@ïè%.‚°•l95:ÀNâDğ ÖR\n€Ò#ˆ€zq6Èù7\0Úz²î4n‘Ôlî@QrØº0ç<ï2¬ÏcD€a<C3‘`péÒ…;Ó'.t.Î÷/&ìæ\r5CPó2à{CÂÆ:ÇVåâDQcVîTõÑ]GNb`Oê03[¢gIÿF	F–>Í3B¾h< ø3¢\\\r”—Gtš³ŞÑhJlÒÅ\"-üoÎ8®<AîCHíú‘@R…´Â¼ˆ3L‰LÉM4& Óã.ôŞ¾É°0²~~ò¶6Ó™1åÖ]¬ÄASÊÍ\0L3£B ïBì.Ò£ÄIv}åĞ\nbè(2ó9fo9µ6ãrÚÎÜãOº”btn	¨Ø¦ô™¦şº­^&p&(¼à¼ãPŸ¢¹IÇşò.kUT¥)dKƒ	 ÂÔmŒŞÎ¦_íõXeŞõYJSidOU¨ÔsÕÂj\r¯x']òáu°œÅ4-<DZUõ¡XµY)ÎÄLÖé}[àSMRÕÕ‰ZUßZ¢ÚT€ØVÃÕ,ğğ¶úUPúæ<SE%ÃtÁVr¨ù\\!\\f†tóê4§*üö;Ö&l€ébÕÄrqw\n¤Qd17B´ ÕXàP6‚*^…Uh\rc–;f8²\"j#tRfºh‰@èygÊlã¬;ˆ	–i\0ËiKZ tV<X\0‚7Ä\0@Ôk¶˜wv¶ –»köÂ b„	«ˆI æòCiî\n€ +€u9‰êÕ–{gæ½ojlob>q&6,` 	à¦\n”zà‹q¯fH<6m–§o–Ei6øOÄ6!‚„‡ãF€Z\n‰hZÏinìÀ^\0ZJ î©š¶d#ã‚4àÉ]üRw+rjmsæ(@°·,¦ÆÎ¯+\\â±nGjV¨—g\rwl Äo-E&=&ûÏª±VU÷j1754=4:BÈefÈq{)“yw’l…ertfK{{2ÏeÕºˆ’‰h›qÀö··àc;Æjú×È¾÷²T#¶å©¨cb\\nB„xX?îI Ë1oJ@³æZ ÷\"ûæÜñg'jpğ í¯(§ Œ„O–„@X\\\0æë’Şrsi€¶t ¶p«Æ@†œj1ğt“pÛ2QíL`¬D-àÖB8}NZZ,5Ÿn½ÀHàÓ§©=.GOrCg+•\nËÅ^5lB,¢ÁÀøEå \ràø–érä\0ø¬Fxø©ŠÌt4¨ÇFÏíé7sjf6Irş+÷b ª\n@’‡àÛ¤hz‰è*v	¹\rùZ£¿½4¯î+‡Hºµ~|Ì2Xµ#òÚø\ràÔ\rä<(@M­Å~…¾W8Z\\B°‘ğ·Ã4 E…¸@|eydë‚ €_~ş¶dÃÉ³V…ÊÕ˜Äæ€éiİ8rš\rê¾Ù“fBiõi ¸à\\P+‚ ,dgC¿†p¸æõC7ö\"±èÜhšùy–˜W8<X!qö…1,Ä\$²üÌNĞPTÀèç‰r\n)ú2×Ù‚\\G;qrÿÍ)b¹AÉ“ƒÆ9,è}:`é\"NŒv“€î/ÀÜQtT“®ïR³<Dó¾F”©J:G&Œa>m\r4óÀšo>FğL\nË¦=¥#k¥—ï¢GRÅa¥ZXÉ\"ÿ_d<!*~Å®&N*	Š0J0G2Œ˜Ú¨\$‘Ç'ÆvF¤n!rÊ‚S,l1´{>†;_@İåz§ù:‘3CŒ¹şèÕ\rFT8 dø•QÉc2¦ÌçÑ¦”RkíFæPÆ\r€òÕ©+d°\rÎàn¬¢‡@vEi€æ2EõP	ï&1›R`°«ªúu(s:rÀW8!c·[BCø Mm\\÷E.òÀ{XÅ4O6a§,6F@ô@b€XQ*\0àÁòõ0I¨ıd\0;g#¶‹¹¼LHİ@·îº.jbÛ®íq»À{»Û¶£F€ê\0`\$O¸n³š.ÿç–sµÌ\ro%ùÖcÍÔ1&à7û»zœFºIDm\"\nRppÏ¼O/x\n€ŞãÄ=/Û¹ã=Ä%F€²ş»\\1`e¾<2–t£¸;ÜV eÃDÃ’Ë‚\$2ükÆè¥eÃÙ.ü„œtVDQÆ£½µ|~¦§Wˆ)ĞÈ»‚â›IAŠÅ«¿†–Å›<rc¼‰\nsØ‰:P\nn2éd„56%^ÀCDX¸yÙÜì¥Êí‚*Zy 4ù%‘’úr®™\\wıy{€Cf9ée¶¹òáQó¸pÎ} fØ\r]¶°«ÒÉ}Ó°Æ;Š»\"\r{µ,€ÅmÔÔÀİÈıT›¼¡¬ÃÕÜUÔ><^Ü&=<-cü1Up¼(W¦Eç© X½tü¤niÆœ2n‰´n\0˜\rä7¢jQIt„Cz”E‚‚F>Î%´\\¬à›f/îÓİNÒo«:¶Hİ´Z	FÕÒ\$¯[µ¿\\'#dÂ„í'™‹£mÎÓ·­ıÍ:=rc={­Ê†£³¢-€é:=×´n-Ò9÷Ò‡V;ıh11÷¢*<hÜ¶iPÍã'ê7å’ÔŸR\"Bœ¤ÀäüşLJş\0AÍ£õÒâŞ.Ó¼pŒuŠ~¯® ¡˜[Àséã}Úà½Î\$ht™.ÜèÕ4\rõ9C¿Q6\nšçÍSÅì~ÊWnÌÈ“€\$ÜBğ¢r\r€„—Â§õGeˆzy áÌ˜ÛÌÅM åëäÌ\$­<X,CÛ,’ t Xn¤Ú?s‹\"•­LÛúÒ0i£\n'\nE\0ÍCÀrÌ^ûÌ ‘Ìúm)+Ëêˆ ÀRÚñ¿ïü—_Wğ<ÑõÏn×ì²øØ—KşOCëÜbiÜ–X±ßÅ„]`+Øå¤P•xOP¼[µ’éV+_ÙIW³iëOgú“’šŸ‚ä=k ˆêo‚!_nä%c—üæ¼Â!ÂTk|Ê+\rïı©,;EQ¿ˆÜßlÉõÆìæWôŠÉıc6«ûœÊÿc¿ÍÌ®şSıÈ\"ÿGş?²«Ê6úğH¿ùıéx0Éƒ<Ğ4À& Fä.R»@ Rù4Ç ´¨=jpÚ,ÓJ5Ù‡‰\$ò\\¤V´±\n¼~RèIlæT÷*4–MÆÒ)@ğç4®¬ã'³~Ãó‡ØÌÀß€±a@djiJBOQm‹·ÂÊ8Œ‹!d ‚Ñá`¸Ášª}7çƒ(ãÕh‡ìLá\n\\Ã•¸.½è­îm2ÂÔUŸ,úÆ5~Š @úÑÄ³Ÿ´:Çï2ÁxÜZ“÷(«fƒÛê Fû4>\nr^[ÂöÀ'Aå®ÙÙ&FRÇÖ£­dº0.h_ÂPÖĞ2|æ k\0Y¬\$ı=¯ \"x`@D(ã „0& r¤øƒÀ Ë2x‹\0Ş¶\0ÃJ‰z]	ä€\rp50€Ìà]0R\0 J1Ã€°à‡G\n‡„C±„0ë[;Iä«5Zq˜¡„‡ĞCœ6!>`cyĞDô& ¥.OFféáôğ9ÃèM!ˆˆD\0_˜W›\0Uìÿ@±šòøi*\0.€m…Ğ‡¡y\r”¿Äzm†i_tĞ†…Èí„ƒ¹…vQ4s›­-şÂ\ršæÔ¾CÄH\"Ëîò•… 0(kò\nlŸ3£AÄÓ&¡Ê¢PĞHŸ£†*ñ\\yÊûgÕ>°P/¼œWŠÑí4ûGÍaI	ÀXYÃ°ùIÃ}4Q†<ªä!ÀËŠ¡‹Àá_h{4ô@%@wìØ˜S¬È'OHÃ£¹&	G£ÜŒa\0ä»1™Ğa\0h˜IbĞ51#‰ğ\rÀDyÜÀÉX2;˜§ÇšHlj\0ä_³Gu¾QqD,PÄFå#°¤şÄÉTŠ€Ö†¼EÀˆÈ\0ËâÖÆ!#\0DÙ2Qî\$î±İà\n Èr´W\0ôsfN7uQZrĞ2BÉn2Äuc¢j9ÇE;N°MT€rĞ-™Ô&@]\r³\rğ[xêÇ^=ã~G#èÊ1ºF|.QæXPbÑ0*øó%„ÙOÄ0SøpÒliş„9Š‚Sğ*åÈGA(b½Ì{YÆ\$–†õT}Íõ \0úÈv;ğìˆƒ¿ÙÈV1ô²³¡q¸E¬û’>ù‰¨1‡7¢,8&Ì\rß:àÕÅ\0¨Â}*¿¢ì®È!¬@¢½U°@`(ä\nJ&vj\\)“38kv.Š9”£¦€†ejHÅFEÚE#¦q&¬ ÃÊŸš6¸Ú ?Š0İ‹ª7’ê±Óˆ”¯‡N«Ñ®ŸÔe€=cù1ˆ‰@€]˜ÅF.7¢z°e’?„¡FºÉø¶ eƒ.èT¼ÒÔnRi•vÆ*@¨\rÊUòtùŒ…Áv ¨»¨«™šXÄÀ\$, |W€(Id^R¤²å:9`K\n	#r'Ğ_•À„CÃ”¤s‚€m¤¾œu‘@\rƒ™Id€Åö0&Qlc“°Ä\0RùIÊT”@ØÌìR–1„Àgá1[/à:\0‰€\$àD\08|8!Ø±0á1¬0Ìrb°”í0y9I|E’«H´¡Õ]*1—…@J³\\|¹Kp(‰^lJ½„9f\0µ€êVQµI «æVe[	È!’Ê”ÁlJRqJák!ü•Ú2Â“.i1IĞ©!\nHåÓ1€8>‚„®\$í3ù ˆzW3D™DÑ‹í.y¥Ì·¡ÃoiYæË\0Š:hf\"xpÈªp‘ÍªA\rpŞ\0Nç%—D‡äAâƒNórgÁ	*`EO)nÎ4@a\n€Â–)r5X>À+œ€%W901KTR×D8ô@ŞQ¤?Ü\"êœ¢q€©„rĞ€Š1z\r\$krİ\0åağP0!<\0`WCÖÅ¡0GÏ•Tò?5æ~XÎ˜Rh€ÍOâZ·€´çõŒlZÊæ¨\"-áO8ÓÓ*ƒú½xĞééØßdëà½¦:r«C§ãi>(¢€´ ;&¤ºÆ10OÜ¦’––sìIò²±°JlÖ“èhE?Ü\0ÈW³—Ÿ„Ê¨™Z;:vä_„îB°Á^™Ì4hí•!„Ù¦\$&Ïw™\r†\n€ÊŒT& !L=â˜´,1U¨Ş”Ú\nZ‚`/Í\rÕw\$ 8PeP)\$Ê¬J‚&,#~*ñ«'.‰È›Ğ¿€|›ü™'82&Ê‡!FÂ•(ªK †N³„¢Ò6(¶_cP<!rİ0•ƒêĞ„¡i”úhÖ¹ò  pf»£q@WBd);VwÊ%ñÀÈ|;€¡ƒ5Iôıe\\0  x4‘u\$€/)z1ñV'õA\\¨Àa*QÒ<t+ø¶ÆÉåÒ†3t£'“€Ö­J`½…A‘Ó?[æH>\nE—ĞÒã¸.‹‹a\$S÷¡¢:qDoŒ,äÖ‹ ¡Iº&ÑQqiúÜoLyàÓ\$º©\0Š'b‰'ÂÔEH„Q)¸\$l\0-È¥J‚'”&ôÛ'ÍT˜x¨”æÁüm1c·ÎI°’h8Y:éŠzgÓà£=EÜ ƒO\09Ón“ô@‹•5¢oM‚u9¾&ôßOQğBèñ8L2\n@Àé´…AÓ€ôê¦amLâL6/Ô~/!õ¦õJèhPSŠœ”æ:F\0-Ë-Z/Æ>l¿Y(\n*@h!E4'uKP‹3ê<S®¤8hÇªpsğˆ}ÿ°ª\$SêI´ÂÔ•5'“™ÃÈuMêOÒzèP”ğÑ<0U„U\$õXB°yN·¡çùRCºÕ*©‰p'TÎaşTpE!5F.ô|Y/–<}J²NüQug¤	¯ÂÚêÂÕÁ¯‡!Œõd!dJXTâ'4Şˆ¢[´ç=åÚÃS«(¢Âx­áR\"‘L0ƒb9\n~	VHè2´š&kÒâvt#7‘	 ^@å(%Ü‚;’{5uyìğœ½<PÆ°vT¹R˜¨EœKó…<\"Ô°¤+C -tµBå ç]ºã¡‹‘tÅËWJ‰ÔO6|“ĞV¨@m=F¯Lu#cµC\nGGö¢â¢è)ı~	²Ã¢n\$,ƒê±Hü÷\0¶à9ğdq1Hv8\0ÄÕXÅLPÕÚc´•ÈëXAåÌSb±€‰ê9’•À\r¬ke„¢ŸaA¤:)\"± ºl9TVîÔÆ­µgXIë7-¶p€M…±Bz‚.Ú²&	2-°(G ³éÎªUB¤ª\$©cò›lÒŠ|õ¢Ù>JÚ“²ÈõSTø\$¤§àÏá‹æ_‘\r‘@Ëdq(<\\¶	Ûş\"_8à† Œb°¸š|DÍÖÄdH±1kl=¦FÁ&Fè@D‘³Ù²±¼³y£,â9Å ¥`[ğÈZáö7»Ïƒ%ÀHê‚:=fÅõV±‹al‰h;3Ït À_X@x-@û7JÑÁ¦³‘€¡ËeèÙ\nĞ§²Õª€İd°‘„.ÕğÍ¬æëi1NæÃ¶¥šÀ\$tWÎ¬ õ¥%½ÀÑVƒ‘Y´‚&Œ[Øˆ/g99JJÑ³­†BAaQ–¶¾CZŠ›I£ùÖ”m·Hë)k¼(»k?Tå³Ø+ZujP…ëwî©Á_5‹lúŒæOJ§6ğR\n“\0ÏoBµ—Ø²Ó¿xŒNšnĞÊ€Ä@-«-.Âÿ>Ãøº~¬²Rr­¦îtN\\ ?–¥zøéjOEÎU/\"øòHÚÀp\rÀ\"“7j»›Ã6ç“2KhÆò§/U”¤ñn3¥]9´‹TR#ºh´k¤1Äö7#¬¼\0”#X«j«UüºQdkar:º¤lÆëjµÈçİr‘|Óİ­à¥J™e\\¬n@:º\nå©C»­œw=­ÔEî‚»\\Ñ¬W‡\nÅÏ\0Wt+¥ÏfêµÑ™¥nµu9ß×8R×Nº½Ôk«	®¸\nlÖ¤InHˆ74e”ö'\rk|İÆ…VUÖ”f¨éõK§Ğ°ô¤q·‹©j-µÒ®ö¨ü’9¥FÉ•^„f¤µ¥²suáí[Pï«\r<`6“òûµeº he³ÈÆ4ò4²‰Pâ‰¾ÚJ¯¼òR@#°„WÈ=—\nˆCK1IÑ£>Rs\0XzIl/Îç\rød­±	Q‚Êÿ‹İÀ^  9q@|–áæypšù–!úö‹µˆõ\\£ëı©å¤,óDQ€,\r`ÓÀ|2Ó„8\$`NÖp}ú……K`h¯'\n½ó-\"€à€\\¸\"	 íœ°;h¥ŸA¿¬aú0\0úZÒüıõÊ£¦ãHYİ©8RIå!„Å)FÆèèerõ0¬l“w\\UÉ,ä&(©\rZ©âîy7¬™v£¶~£ßá*XX?~ËêY4SŞâ÷¶¦B\0)§{˜Iî÷¤¨A51[—£ËÄ+\0001A+îZúy ¬P`}Ã¡ùc`”N‡‰C9tm¥5¹yÏ÷õ?+áã†Ì1aÀı‚G„Í_,:Şã§ıëpùM?2oÕ@< kö}ŒGÔRSÁ-~\"\"ÅAÁŠåˆBzHæ@ÓÈº¨¤£Ş\$ä‡‹ZhI\"Ÿ•ö}\$±¯IÿU%¨DMæ×Œ¤& }(Qoq*–§,bSã²Å\r0¶åÜNS\n´s¬ÆLzdy4QsaÔåE`‚yddíK`ÄbÃÄŒÆ-¯‰{ze”/,Q….Üo–E¶¶ë	ÔŸeDæ-ï\"l€3áa8L£øªºyÆ‡É<™Ä€.l“à ŠKò<\0¯\$l©eZ~gzş<~Ò üH–Mò†¼0V\"m–AP®jÑ”<'ã“ñıßÓ=œ•O<O€Éròc=ú€pÓÁ@ÚÀöruTàAXÕI‚€D' X¯rÆŠ<²ã§÷Ÿ(oÑ‹ü¾bDæÃz±¹‘%z€7ï”À„Ôò‘«#c!Íÿ4¢E)Ä8Y„·3*²¹ó7™ŒÌuã>ª°Ä‰e`fIS]Ş‡2u§Øäï‘P²YÏ69[ÌìC³>„ìĞ¡H×V®N<ÇÁ\\†¼§cN—*ï\"“eé»D>’i\0ğÀ<ÍõÚäÔwËÃ4:=€UéG/hÂ@~ˆî¡”BícâG‘\nUŒæ©\\h+Dˆ€è»Û6Ä‡3 ë§×† 71î|œ8p¹Hã:€aÎ°x.r”Šh;f\n‘!½Õœ©†¨‚:a#3 Ã…Øğâ¸Œ°O¡ài†õíÛC(kË´;4”ÿ9¹«¾*\r‘ş[­/Ê;HÈ²@’Tc®CFèÕG¡¬\0O‘\næölHK‹p[|4uİÈè s–R@ÊrW@±vajÒ[94œO½O*u\0004[Éú¦0â)¤zW'“ÕäDı0ŠÛLz;'Î™€º­5ÙÆõu<‘çõí¨8 õÙ<p@{’ML‡1mÀ¼tOè£Ænhœ¦Ây) ÁHøÓÀBK¡@:iù¹@hË*çštR\0·S\0)Î Û©#iô*­I’B¯…‡¼‡á÷Eù—¼ĞLÅ0zMê‹UWj=Œ”xçêoS¢æn¦\0[ª—ê‘¼”Õ©i4+©€j¯Wº­¨¬3)¢ä„æ½â¢Õ³r5tfMhêò©¬aÑˆc	ğB–FëWy&’/Ó¨=,êÚóÔL»µx ¬\r€\$Æ|õ½§åMˆROşu¡ğ88·`:ÌÓ®Ál§°}Gê»R7Ô‘^tyµ7QáëÚÑo‰Ôó/ƒ7¯\0îëZ,½¾¬êÂÜaR9¡¹!ÛÔàHB\$©°ìƒa\$qÕ`vGªsÇäñÀ+ÔÀŠµ¤)\r›ërsÒÖ–H%¯ñÚlofšÓ×(5ÏI/ŒÏAN\nÚª51³ò€è­¸Ê›)û×¶± ªh@«8rç_}©è2F¦ùĞ€»4%¦‘¿mNâáIföê“ÁÇÒ§:Ïv~ôL#¢'íó?9ïĞØÄ„t8]©è5Y¦ù“;–!fy\\mÁ•šœp\nĞğ\0µ\0¯XRq_NÜ!í™p\"¿‡~è›ğîke4\"(ew<ÂRn‡t{¤İ6\$É®&H²Ğ–Fv–®_¥Ó%D›]™hŒìH'­QD˜ì‘&sÆ—áw¼Ğ3^*Ò€=•-‚ºMÑ‡ĞCBøˆ7Œ#¤.:®…XÀX5É€`¶Îz ´@8\$95zÎÔí SŞ]\"­%0ãÂôDê¦E1i³3¬<uøa`¯A—Gÿ+ëgoÊ\0ecÒÄ’è_mö!’6¢,¶vğğ]q›g²ÙÏTjÓ•Ì¸–Å‰¡-²Fü\n{û7Û;¸7qP×S›r>	ÄŞÂ‹.x¶ ïpkz C8×v†Ñ­ïüç?ß†Á\rÄ*Q@àÍ1\râ{š\$ pŠ„Iâ€ºHâİ‘Hqj»9â(ØõÄÓ€ÿ‹Yò¾ÚÕø×§kíñI6ü[¿(ÜåÅöímƒ~è®„Aíó²Ón,}¡¯wæ;Î˜+€n i¶4\rxD· løIpmÂ=ºÛé;w%Ö}~KHú°hpkhõ”Ànp(ÓÄás°9šTc´ä€äßº0‹¶\$q%ˆø‡6Âï§—Ğ€\0à €ñ›äc\rÎF0sj ?âÄl‘¾#g‡Ó£bÂ óš\0\"æ€ø£îc\0œœÒO7À|ÅH·†™Ğ€*d”šT©áæ€\0ÅÏyRpÀ?è\0\n‚Œî€Gš\0eØ\nÀZŞ‚SŒ<û¤¸júĞş€[k;ãÉp=ÁÇ„1¼Ã|~·î}g~ë«xNås[ÀO½åµå›eä‡0³ŒÄPÆmy‘ Z`‘’tÉè‡låYu®‹±Ro[X÷C4.Æe®tzĞÂ?7B;Àu™.&\"ŒBçVM‘0¦\\¡p\0'FáYp¦]@¡—ÁKYK¡Bæ€/¯Dr•1ê§U†``+ÅpW:¤¹€Os¦±ˆx&æ0®ÀùÌéqĞuwG]N¸O\\Ë³\rø½eø[z¡ñ@|Ş}Rkïcƒ¥úHıZ-U/!¼ïÃgÒDæ¶”ğ@Tó¼OXìızİ\n!¼p§³ÓìğGbZ¿@/ˆĞä\0y²[ êt/³vŸµ®í•ìex¨¤¸€ H.nœá'¸óÖÒ&|7àä¢ƒ®ÏWø¶'VÓz‡`(5¥\0w*Yú)Tà:çrÀVà®Üİ³Ëğb;†Î-„”æ‡U–^|µEŞlùt+îçÈÀb¥¢g¿Â”%çwÀ¶sHúO,-½Zï?÷Êˆ½Iµbƒí»šñâV„7½v”0;]I>ù÷³½İğçç|ûêîÖ÷Ü+¥3ïÑõ»ù¿ŞáxS\rSSAß^\"ê¯\"ĞÏÉX@nğ·€É^€ÂÏ/wÒØ`Bº!ï&ŠØd¯ğûf®\\÷\r”!}Şï…ü´Jòx\r«îQpW¼ƒàß¨<·¾z‘o|P(³ö[Îü+ßgÖ+ºVâšŠ¯\"Ó\ráâÚãÿQQqšÁñvÔÃ	ã¼ˆI´ø‹ĞG–ÛT‰U¦€úoW\0:Òàšçå?J¤Š³Ae›œ\\¸9Â¬6©éüÆ:ÓC²’å / <9S”©¹FE\$)<Ğ@;zF=?p\ndõ@	\nXÎ\${(b3û—˜ÅÎU£À˜“NST&§ohSJ ôBT~á\raõ|ø^õ”6ÁMëJ_ÀZ¾Ş…C­`+í×[â`o>Æóq…Ş×ÒÃ»8JpN¼³DÅr—¨\0Ä .*_²H´ì¨Ç½øO%½VJ€^9SØªNï‡Vx%öøÏÄ}şp_¬›ãíÌŒİnüsÎğöDæ½dˆ»´jS‘â *•z	Ìş_ï×vÙµ¼__»P.ë3‡F¥5d4¬  1^³şÊ™š}l@õ#¿Ö€)÷Ñ¹j5ï¥çêç?áPŠ[ğê9_Ü*2#¸¢LøƒÑŒ\r~‡o_\$5éA¡ï¥¸ésFŒ4†'{p™cíß¾IGÕo·ŸÔ\"©\$>6M(jI,“¡ÅøÇ‚ S”¯àµîó› ÙÖh\\rğ\rlSÔ.ßÌp‡?¬`<ü@W–CÊïÍJôĞ»ãİD›Ş]g»LÄÛgC4ì~\nô8‚ç÷¿ÔrÃÑBï‡Fš?ùX~ì+ÁÛ*’7Èv_ï—²@aù ñ`2Y+ù=û¨Bß/€/¨\"^‚xBÀùQÀÓ…vå#[şê4ˆşĞÑÿ‹\\wr:g1€¾³à7ˆ†ÃÒÿ4¹Öÿ°h€?ş˜L\0!E?Ìÿà¨ÀÿàœÀøK…Z-<ÿàbÆk@æCÀ4À	hğ„ô+#±¹?İ4ni¶l,€ÑÀ\nÿ@£ï÷—¼@ ùº²‰2¡!^Àfˆú›p5Òa™%¡¨ûıª\0åƒaO½À‰‚N†ò¹¤‡¥Bïàe<†}Óá=šÖF( Öñ¼\0004¼”/¼\nÂGdéQ¯+’€½\0ã˜éed'Àì\"‹\\Á—€„\r®“¼Õ¢ğ\0ğ¹¼dœÂÃä°À\08V…ØHÍæ@òŠæğ0Š0ù€\rçl€îÚ/°\r Ø^B?øZlíá7Ÿ\\¡.À¯„PJÕ±\$PL'G,0NÀËûç€.5ø¹ºîB[™¬x\rÎ%•rÀ/'»aã A€-x.R‚;«Å\0¾î»İå¼¨åÈZÏşßpÃ°X/”‚7A†)ËPÀ.\0®ÇQ°T&›Tñ*¤\$DºePQ@Ä'Ì +€TxbP' `èp)pH.‰Ğ“;!ÎAÄ6Œ\0Ò\rZ©ÏÜÂ›ın§\0SDÌDÁgkª°w´Ëˆº0SºëËéæ€lš0KÂ\0,0ˆ±Ä0ŠÁ„ 1\0P	€*\0Š€!¥Š&@>\0ˆ	à(%ˆ(	À €š–\n`\$\0»£š€¦	\0\"€šŸÍF€@\$'\0 €„\n`\"†,#0€ÔëÈæ¯óÁ˜›”ğUÀ\n\"D\$°EAc˜‰ğ\"­Ü%‹ÂÁ–ëô°_Áİ	ZïBæ\nÄ°aBïè…©ÏAŒgBE28 …ÂÓ\\-pl¹û0ÁB»\"Ú0°>ëô,ÃÁ	\0*8Ğ´\0u„-PkÂÙ„\"ğÁÃkC8‘€kÙÃ?ô40‰C\r\$2PIÂ½Ü\$0TÂ\0L\$×Á_\rŒ\$ğÑÃ!\$#ÛC)\núğšÁh\$Ù ±½ŞıÜ0ĞİAW\râ ÏCAd4PÙÃ‡ä/P±‡;êt0ÛÃ£  1€Ü41`5ºó%PÀCkÔ<p‚AVÿ”7ĞjÃ€‡Ì=QÂâÄHÎë¢/ˆ;ë&CëT=PvCk!™Ì9İ\$.<†“˜0\$-„*ÄA€úÄ €\r1	\$D©Ì ¿ä¥,;bWÂıD8ÓA*‹ñ(Ğ(€‹ùH¿‰3±¨“DĞf	D*ıkLÆ]–íø‰ƒ…,H!'c¬”ÿÄFÇtH÷‘G¢9¿—ÜhÜ=ÃD„Ã‡sMänŠ´ôî](ıLCMt„\0ùÚ·Q,…'Û–.¥I±OIå¤~Ï>Ñ&D¦¹‘Wd»–SıaÊÂ:ğÁ\"û<æ\rÁPG„:ÈõÃ Ät÷¢ÃyÄ|H#éFÿ¸ 7€P‰KH’DËÔÚ  Ãw?7td¡Ğ\$gp±“öov\0DŠb\$FJ=æ[úf_¤gbÂn¡‘\" /‚jX(ÎÌ`è7)4¼a£3¿˜é…àµ²*ò \rmÈ€åÒdı^ªè°†6:@ y¬’#8.Kq±\\˜@A8ˆ\"39» @£ø&o“Â@à€.”ªBQO\0tâD]»`#k¢Ïî#_‰…jGœä/ºy`Ñ\r[P ±¥PP…*4-~6xîáôÆ|ƒF\n‘_:B\r¨r¢;²K¢]0(Àm<Zã‰9to%Åø£ÊP®C+Ë©ÏAı„O¡·'ºZ‘ğ~C‹€p(ÆM8àî‚ •@+Á–\0ep…1˜Åí|<QŸ#6q¼<Æj#Œ_ñ+EXsÎ‡’d(`¥¾V\n²¯½Åüb{ótZn–C›£!¿!æõ°w Ÿ‚‚ƒ's9ÔhØå\"<ôáS®/ö¹bşà=-ó7úóÿ®c<€»î\0Áû£\0 ŸV‚ğ4f¢ß–ú½Å`tVQÀ‚ƒÃï`Ü!ì&IííÇ€òÜŒr 93ĞX|lÁ!ì%Ù'N³şıR7—¸\rìK©n§¼i<uH¿4¼9†ªû@º@<nL_ƒe(Ou?hTowF¥ Ïy>„ÎX`ÊG¤ê1dn1ºÅx“<z!Ê\$Îõ äÁò¿Ø¿Øª\$Á-Ä2•A„´UrQÕÀ‚£Ú¦¸;£@UñÕ3.‡(ÜÈ\$•læR)	ØŞámn>¨ø±ŠÊOEÜ™;¿ÃÚ¬aƒ 6Ç¦ e‰>=N)JTbW‹ó×À=¡àYjñ‡‘k3Í]H)äX@Ú\rô¯½NìƒQ«H9ÌR‚WÈ@O0eÆ\$Œä¢ƒ¾ˆš\\éšŒÕ!ÇB€G&!ŞÁj‹ğØ1¼€àê¹Ò€*ì\nPaÄ<'4œã<ÌŸêGÀõáÈ›X+Ò\$Á\nìĞÀ­ÄV¥¬'¼ ÃÃÍg	pXQqí•,Y!2,“j™Gñêƒëtu‘8\rX—ÈqñFÔş`âïÈÿ#ê\\±:¿ÚL¤†„¿Ä/ì 1‚#\$a¡04;#¬F°«x˜E—‚û³›\0:9øº)é£„-„u‹CÈ:b=Ò;§\$‘ËÙ‚Ç%kÿ¡&ƒW%@]’U#ì\r	˜IrSşE¼¬•T|aÊ¼÷#°\"E1Ç!Pv½æîÂnâNî0)(\0t\"|C²@I\rK­¥úE\0\r‘!I9!jòjÈúÿÄ›eI´ü›’o?ğ4œÑÉÑH/Ñ!Å&ø\rëN8z\\1É`ÿs2}CÎìÔ ò~¿à0\\ŸğVçT%ï@Tˆ®0êºs(¡P@…Ì5a\\Ê(H:Àcÿ²ÂÑ%V2R‘k%<KÅ\0¼´ éRÁ–îqÌ2bI‚ûãŞÎÌÇTc\$¤1¹?>6ªeu=Ü£2/ÉÉ(„§¯şI®±Px09\0|ÏşJ+\0¼£p#\0[şĞ‚.à¤¨ÑW\0Ùxğ\0ÃırJI)˜ñŞÉLTT–€;Hìò›K’–É€ëln™ÉŒ\$˜’d–#`¼\0ŒH”š#jÉ©(‹òk¿ŒXx[\09ÊìÌ’vK\0\rt°@ˆJï#ñ”©p=\"óÿƒé\nÜ¬¸JDTHÌ‡‚½Í+TnR—É‡+t”’›FìåS’Éª9\$¡ÉÈ:t«ÒˆÁÌ»ü¨\\¾ì-Ä´1º¡§)¬ƒ5{,äzR¶;w&\$¦’°Æë)¼´’Ç3·-8Qò Õ-XW²ÖÊ{4\r+|˜’ÛË0ƒÔ—2Ş),ô­±¹Kƒ,´´Ri0{-+;rÔÿä§òŒKÎÿ´¨ræÉSì„…–l¾û! +l»G‘#Ê½¯pˆ§/‰šÃ‰4aà“rşµò~oKßLy4>0X=-ßHÚhl¶È•4½ÒZÀD‡,rL3+4Ãr[š&¼Ãò;L9\$ !!¾Ã.q\nÉ¹Õ/4¿òû#d2ÀËåŒÆÉé',°ïìÌo,,Æ²ÄL~ÿÄ—Ò—Êé,K¦ò¼*nEÉY\$|IJ»0‚bj/0•À†_%\\œqFÌy&œñÉá\\s,	ñ2Ò>“Lw+üÌwLÅ&ìQK%I,4Í¢ÁÉß3„2?Iè[Ìº’ËÉO1dË’EI]ô5ÓJÑ%ô¥ÒßJbhL´šË‡&È‰’f<î*R¼¹g‘©Då€Pƒ[e)È©pÌX™d¶¡ÊK+.¬¬rÌÌY.ĞW2îK4l¸AÊK‰&˜ÓP,ôÌ1DLğvhNÊ\\ÛÜo¤³¿6	U%«I¢3Q@bçIüÉÒFÌ¡%Ä«2}‚§-|¶0\0ù.xókJ«*DªC*£şĞê%Ç\0d©óqÊ¢vDrûKå\0»˜ĞÊ±\0ì’­­D™äá2MJËN¢üù¨@HLí3|HS^É,ìØ	Ø‚ÄÌàÉÙ€u683d°I6\\Ù¦„É[\$„ Í¥6ºÉRØ#6´Û£Íµ7¨ò¥M»(l¢r¦J’ÿ´³‘Ê¥7Ja0\n˜Õ*¬İÒÈÊ³7Œ«“zÒí„Ï±¹MòSx-±/ÉˆÌ¼{Î}tuÓ~¾öş¸NOí@i/3ûèRÇ€\nL	N¼.]#l‹0ÅêŒÙİdF„•|Œ¥jœÂqA'€x›‰`9‚ÇTH¦¼÷œßÒmÌÆµ”Ø“aÎ\nLáb8™ˆødI%«>•\$ìäZG†ı°\r\0ÎÖşŒí³;Î8Do³¹Fû;ÛY PÖKánÊNò³Íu<<î3Ä'd!B…e«O8!lg -Äë\$ïÓ´½İ<­“ÊÎİ5ÜîƒO<ÜôBÏ=ŒîÎÉ\neü:gĞLĞ@m=ê#è{{<ûüâ%”}sârº¾ôLóñ™Æ*npD.å>1ŠÇĞĞcCÀ©¦şc””ÖÏ‰Z•“çCá=š…q F?¨\roÍ°dD  ¬=ZÀïÙ\0N÷|ò…‡º´#¢Èû?”ªÀ3ÏêkÈ*ü:¼›«m7ĞóàÙ±ÄG9?Ô‘Ë‹ï\"óùˆ\$Àn…ãsà5´Ê±<şÓüOÚ´úğ3—æDú¢û!v¬ÕÒ>‡ˆÜı0D\r¢û	íá\0Û-à·a@Ô}	zOˆ”Ô^áPf•#RíáO¦ÜøäóPB5lûBÄGø'uídÄV¦ØeóñCÅ<u\nÒÃ'\r8-´·„6Œ±ã3ÌN%Øo°¯Bêºsš¨ôÎ¯½ØEF¼Ğ¨Îu(À¸Š*ı>áŠÎ§ø‰3÷fÂĞÚ.LÖóÆ:!=!³¿ÇŠı¼õüÌë=\\ó×O4	ÔñóÙQ#=¬ï>k){ø1.åE‚wPşí…ó:!¦NôlHqÃ×ÛúÏÍ	ëXnDQ7AøôUPöé”dSñÂ+•sÃLâœó3bN÷<ìü‘w!:ğ …ÑÎĞeÍóÀÑ<,à]Ñ=}ÚOf÷\r“ÉPúü¨12Çƒ=-¦–Ü¸îµÎ›eGĞ\rY/¬å¡'PÑY³P\nLfpçÆÈ	ìlÆ®t¤œeŠU¦B\nà\0€G¹ãÇ\0ëŒ‡`¡Qİ/ÀEğ†Z¡X4K¡\0~İ4Q<AH9Æôx€ûH•³Kñ,lŸKá(Û¸4uO’´KïH­AİÆÊû¯ğY:ÙôêbQÈÜM\$‹aÁˆâ\n8yRH\$rTƒRM1™e1Î„—Iı#bßHô¯:s=üÿT54@ešó?}bÁÄ»E8ÌäPë\0%B8¦ğß,üĞÂÎ›déì]>Ú)•s	ÎcrÃ3¼¦SÔÓ¤»å“¼Ãèä€ ‰’^‰Õ4šÎµ ‚.¦0ÒÔô%2ÀI#Äw©èÇ]\$l4«Œ—5/„³RÉFÑd3¤#/:R#ó¦Q™<½s©HÖô]&kRÌAÜwtÁ‘Œ%DwômRë<fQÖK®NQP`-ÇH(FÇjì´ş'-…åğ…@ä\0Üh (\0 aqe€’háä‚Mğ \$€ŒÀD(tãS‘NQ ôß²à€\n¥ÄÕN=9#ÁSªh	à!\0”(tí\0ONå:”æ\0†x	…€¨%= ä€[OX	€#Âx©n µSßO7à*\0„x€,ÓİO…;Ôæ\0¨0	à'ÓÍOİ@´ù\0¨E@tş?\nh4øSõP%7µ\0¥P‰û‰\0åO<TòSÍO@‚ˆã\0Z	€'€†X\n *Ô\nĞ-@(‡’\0!`²åOm;`'\0§Q˜Q.TO\nÀµ\0O5HEÄ fíGğ¬ÔŠQíIhà8»Nh	ÔìTGNIÇ4?P°õ‡’ÙI¡SÇO-:Tîº^	\"€Â†p\n¥Âz 	 '€œK€3ƒN…9´çÂ…Q€õ;S¢\nÀ€€ŒH &\0‰\nÍH€'€¤hy5>ÂdÀ\n€ ÂnQèTì€©SuQ ™TëN…O=BµSåRÔğÔ¿QJ4ì‡’KRõ;Ô™TÀy\$ôÓTx-@ ÕR]©`\0œYGµW°ôğ4ëÕENİJ€ÕqRõDU0‡“Uı?tıT „|PÔ]Iã³ıâ\rš’ìiE¯™Ã¯À,¤8bğ‡£™‰V¨!Ul/îi=ÂRU°óÔ×2tÌã#õY“NÕ-ìG“ËUÍ'Y¦–/ºà?ğK1]ĞLİLäÏ39Í09•]‘BÕË;}^#[/=^ €fÍ\\udV=dÏU<|ôZv•vÑW<H•uU²Æ=ajÖXe_2e¼ß4 4õtÖ)V+•uU§Vëºà¶ùàÕq;®f=Zu{€vîºµ•jîĞáU›ºüo±¿ıV^¼(À¹ ©‹¢N}»ZBœ|¹öô^4ÌïàÇ6gY@6ÅMUœ+0I¢gEDéƒ¬ÖªæŒ 2†Ò‹(A«ß4ıZukÕëWÌÆÒÅMñWı]ePÖT¼UŸÁdek©õ¸Ì“,-n‘U¤§(â;¯IÅo”ÜL…[”@7ÖMVupU­×àIJVôÄk©ó#Ìo\\|Ó5»WˆŠ˜‚†h…®ëµøWAï£èÜc™¹ŒÒNiFö™\0£@ûÁàÕè„|Îu×9]ŒoS„Wj‡Ğ•Ü9‘XBàà€ÚåóšUØ!m]•xÂ0\0T‡ĞõäÄ¶°Rn_W”ı{OÁ^•võÜ€¹^˜JnbW_H…|NØ×«]›—ÕèÃú„xZµö×röEõõ¬õ_“a‰!]wµáÁ^ àWXExµÜ×||¡•Ö×ı]µx¶WuW¥€®dWw`D£€è×ğŠ@Œ’”\0\\!\0=\0‚hU¤×õ`¤ãuŞØ`|5ã××(­]ˆX‚èØ&_‚éÜÅ^}‚éJfáBÈjG†“øHíØ¡Å¶!!lŠÈîèE¬|0öh”ğ9}‰…‡jŞìO\r;\"ª9(æa[< Ñ¡k6'ƒ~áø6„WØ¢5ŠaØª\"@èa[Fœ…0æZÅ\\U-‹£…Ëc\0DlŒX\" 1­ØÌâİ'G&lE	LêğE0¨ÖƒEb•H2XÚóS‹hR‡œ’ı‘o-\rvE	·–22}4¼’ïÙc%‘1Ï@¦½Ñ\0ÖF¢buV/†-c\rÄJŞS*7öDX©cáÚ1”’¸–úŠ§‚6}À;Pğ't­ï\nybÌb/-ØsÒâpÙ{eYN¯Æ…_e!MVS\$E}˜ãYX%}2 áe…IÚ6£e°%¢Ÿeëæ*¤Y\"oZ\ncp >mƒNÁÙ£ZÀs³åc¥Œ@ŠÙ€æˆVÑUØà•\$YáeHiÖ>—d\0‘VA\0{d ÆVJmí’åj•åg[²\0Y¬R·ØÎe–`€æD{[XÜm’dY*\\èg–LG3f)\0Öh”éS™K¹\rŸfğµ¶“f›L¤]GØ3U¡•¬Zdí¢6;¸¶Ğ\r6ŒYÆõ8lq¨\rhè¬¶dZQLU¡¶W?iÉ\"6‰É=ií(È:4¼%¸!H€ÉgÈ1–}Ë¾y•¥å:£eˆcÀÿª©ge¬Un®ÛfÒIiWĞ\"­şÙÖõëï#‹0õèÉg{Úà÷ñ«jäÆĞLRDp®Há;áÖ5gÅÖtUgõï©–xprûÎW~1ÚGauDSËıƒåcÍŠ”È¸œc*¤ë‹¨?¸»LÑ»ÔĞ0A\0 …lxW)³ ¾>@ı&YÊCQ¯Lì\0Aµ†ß€øl]í³ÚJHÌåò`\$§›á²'—.˜® Á´BÉD@Ñ\0rPx“@9‚ynQ°Å\0pÉqácÛ’cP¿öéÏ'ªû6ï=áaè[¶SLËB¨¾÷o0V@7È\"Y\r½€ÁÛĞod–öÊ_oˆ\réï[ÖKı¼á[307­E‰€X7µ½ÃyÜoiÊÒ\\ VQÌR:s}¿c1[ú˜ÄCÇo-¿–ö”Òõ=¾¶å[ápÈ0vı\\1p•ÃVÿ3F\"MÀ%\\íú\\Wos·ÜIq\rÆ@4\\'3A€EKØ‹âl'·6AM3÷¯ {Û>w m%¡üÀÀ‹±mÖTs‚Nqªob#Ô^ j¡ÛQ\" Õ–º\\Œ>¯O6Øù°&c%”Ójµ‹Å=[q­Á¥Ù9b¥Í¥Z°b/ãp<÷kX„Àœ€œ½»oY¯ö 0z1WrĞRw1º8(\0ÔïœÜø7ı¯Ò\rYkˆ	ƒ]q@à‚º…d“=É@Æ[>pÉ´\\>õÊ/¸qr \$â>\\®™Aá¥\\Ée-ÌÀšªúv›Ö†ŞÙ;u]²OZ\\ŞtåĞ×F;N6xÁÄÇèï³¿\0Gèôi!.ü9˜#c¶dFˆdè¸Rh/\\	0VR—Ú)±½¶½]u­Ñ/€(vâ‘K;ğçkŸï;™Z‹¯ãÃU¦8Eg ]v€\n\r§]3îÓ¡ôƒŸÑ9İrös×—xİ¼S¿p;j¦«Ï^Ú>mñ,Ô)ö(¨¥=ˆKûØÏ}Õ\"’ )ªkAËÚÖ½ŒÄ`1¢=²Áë¼¢QÎÀ¤|ŒjU¨V÷,·wš·k[Ş¨Q>üø»¼›Ìe­×¼pmÚH[¶r•Ğ÷™\\J9¬¶e„¹sµÏö‹œõí¿)3zÄüŞ‰q™Ã¶ÿ\\ÒĞe23gz\rC¨—èæÏ£d¶û}ê—§Úø‚JN’¯÷8[Öş€ÈeVO^%qµæã›ßz=íŞÙp˜CyŞkk­ÑW·ÛÚğ½ì÷¸\\yªŠn“5î×·^óy¸WS•mx{J¸¯s™blO£(á¦ÀŒÍ·5ÂxQ@8òõ˜4eËw!D‰È1)Kˆ:ã3ì‚4R2H8q-ól_6Œ¸<ƒÄù}¨£¨ÉòDGá/¬P‡7Æ\\U)À·ˆ¾#kè)ŒÔgıÉwLú2éµAÜ¾æp¡Ø‡Š”|	¨-^Ø¤ ©ßŠ`{Àn—í\"¦©w‹‚ +‡ n0Á¨Ë‚A» _T˜`1ßíP<-¡Upk=Ëí›°nÓ×­”8»ãpa?Ñıÿ\rf‡¸\rpÓ@€fãæ&ã7ò=ğõ’…€I¸Àÿ€ÒĞë£•Îb8Rá€à‡+N¡àĞ4 …€¦à'0‚j]NC†ŞÙ{ñ,õ_|zxÜÆË×ª·ŒÎkİ¶%HŞcğ)9*á‚’ƒdë|x7o^³„ÇÃ8—éƒÒ`‚€Ï#šûï¨³,Èğ\"“8\00061o?/¼pJü1,œYƒk-Ú\$H÷Õ,¯'nÛ,@Õ‡ °A,£c°õêë²{µš¼âò¡G/>9À&ªÇ‡8!ÍuA!\"\0Õ~ §ä\0€½ â@Œ‹<x\"\"\$†A×k^.‚‚_!åa7_ÂÏh¢)o©'T\"’nm\nfæd(0¡€¦çô& \$U\r<°™áh„+\0)€¯T0˜Z9 =E0«€™…t+ )€§Sh	Îm;`£aqSeMØZ\0€´ s\0œ(\nñnÓÙ†Á‰:-^H¤Wõaâ+/Jd;UşIÀ¼5‚•tWtA†€¨-„nøHá'_£ºB6a1f`a;ZK Õñ×©„Æ 8RÊ`°Œ\0!\0€®Hi,õ`ˆà‚	uAğ \0ùT+,T	òX (\0‹	Ä'@'İ¸b¥u6#áÕ(æîğağnI'å‡æøQW¿…%‚‚\$?ôûXéFb)ˆ±Šx”áÓ„Páæ„¥V\"<¡“9áá\\xy’ŞU£™{ƒ¬æF8™a(ç°zâl‡Ö'è€Y]»‹Š‚©ˆ…yx‰\rŠSbZÕ„àâƒ‡F-8•ºä9n-–bß„M{xvWÑ_Íz¸¸R«´¡˜µÂZ;™b´.‡ô\0 ù\0ÚˆøÄ\"\0¡àLP=Î‚TRbˆa¦0p4ãÑ1Ë0™)Œf3¸ÈbÜCÅ:‚®8hŞxÒ‚â’†xÔÓ½0õÀëÜZ\"e9F³\0ó€æ5Q—éQšÓ†3r&xŞ5˜†b\ncz`0³ƒh	8W˜8˜Ş_©Î9˜İã˜r\0»n7¸Ø…i4ç¯cAV:'şË¦< €Ä	èCËeJ|I2cp(ö=\".J·Pş>˜àÜ\rÀğ¦‡ùHÌBè€Z—n?KÒcÜW9\0d›^AYcÒ°H1d]^.s:ÕG2ˆ¹äŒH\n%ãÒ×æCí˜ÀD8>¤ND˜ë4~	±Â™‚‘N6Œ;\nN=æª~“.?I}leP›˜ô…æ^:™)3ˆ1™‚¶?ù˜T´ğTßœ`	¸¸“ã€’²¡Õ‘ŞG	˜ôƒø²\$`ª,~9êc‘UyAù4ğPƒ¶äÎ ¼fMaWN ¤S€¿dÏMşMá‚è¸Ş`4şNa’€ÜÎ9äw™()â\\”~A8àe”HYEƒ‹’ã@< ÄK×fÈ|¸æRÁIå0cfRYFäTš€ 1eVğZædù‘U]EÖŸ“nO98å\0A!\"oEäŒdNNÅ·Ó~8ÖV5d÷•˜y2ã‰“vWÁ.e€×ÌrYaåc•ü‡u8ë’ˆ\r™4äá“ŞW¹iå”\rŠA&å£€¦UÂÅe«“ÖZùZJÿ(\r¦‹‰–è™oåe–ÀÙtû–VX¹9eÄS 20f„>]Ì¿e‡“şP9z İ—¸#™|‘—ØÉê©dhÀy5D„fxlÕ`ßÎ;ØôåıvjÊ‡“<DYˆãõ•µUYˆ‹şEXÎ‘Şé›€†6ONRƒ·If™E£“î_™q<&hìÙ—dÛ™ˆy-~>¥\0ˆ1y…ÿH#‚ôfv~g¢“f`ƒÖ9Ã9¤02.iaEmšs9¨	G’31Jf’i^jë\$µ9š£\0y®\0ÎŞH:À¿?q,V=9­æ—\"–FÙ\\ß•ÖZYpeV\"fOÙ‚å±c&[EÖW™¶`‚Åe‡5YÙ¾fa›¶\\YVäË•ÎM^fúæoù•7À&e¹Åg›ö_¹ƒæ)—ÆrEúfëœ¦\\PL€éœsYœ°ìFtºgEPäÒ€ÙœŞq™@—`ŒPo€ßçU`\\¹¿æf!f¹ÌçMœ y!§a‚èğ®>å1ÖuyÓåI•6vyÓåxÙHÀ7Eœø1yC‡ ÎT ÆA&ùu™Ü\n‰œ^v ˆ,·8!äç–¦y¹ç€[‰)¹Fe1X™ëåwÖfù‚à”^|YWç³À¦Ù¥ !-c‚(;6}yë:qMş}\0Æf<l®çãœæ~¹o0fÎn@xŞ–›Ÿ:ôå&]ek¹N ÅšXZºç[—€ Üe	DáJg“æ:á\$æ¯ŸŞd¤*è=®P#õå!•R™*’¹yî~ûB‘âbü†¦(‚\$c1DàJ`Óã8‡ş3ØÅƒßŒn‰Ñc%Ÿ	§ƒ\0Äh~@™“h`ç£œn‰†æECøä\$àŞM!¾€[ŒèÅ¹>ãâµ^.@¢ó—XÕ'’ˆ\\¹æT.&sàÿ¦Ps¾YØèÙ¢D®@æD¾5èæŒÖvMï„õš‹ºBhÁŸöJDdÑLˆQzFhß¤v4Ú,…h¹(]–“Z-èbB>™ÙhÖE®T«\r5D®^ÚèÛ¥’9šéOŸ^•HĞéA¢Ğ/Ù¿é¥–ÚTõ£–à9éE——z:éfGx!ái[¡Ş¨Ğé‘‘ÑuÀ8À½YXé¥îSúdã«›¦”ï´i¥Ö”šIdñ¦Æ™úedû¥—:Xe¥6›eèÿ\0.9Â‚Œ¹}hû¥v›ëæÆ)%TzyãW¥Ë_é_§Zzi5‘~“¹;i?§>—yiû¨.5zƒ„u¨H]ú…ç5§@DÕÉb+ü®â-[®¡úƒ¨F“Ùj¦—%lM™‘ã®8\r—DÃö¢ê%¤æ¤¢‰iƒ¦TrÁië˜úƒø!9`Œ¨°z ¿»‹ …:\"c6Î‰ÅcA¢h#øÑã&M.¦9[¨¦Cº›iÎşî‹fD\0¾Æ¬ê#ª>SšåE›£®Zœj†…³–¢NI¢l?g?¥>:4?‹@”6\"c/…Jq—Âc	›Ÿ£š²åSş`)9¾ç“i;`æĞ +B€¡J°˜Bd–° ÔİU’Xnm\00ÚÌ;a¬¨	 #€T0ºÅkTmEÒë#«ş²ù¹µ	€õC\0“Px	ºÃ¹Äï˜\n¬¸Ô‚Ë€ \"\0ù\n\nLÂdh\nÔSˆ'«‰z×k­Ş°ºÛkxv³úå\0V˜\n8cÂ•O!’@*\0²æÓšÁëy	£.\0+\0–\nZä9´µP¤k#\n	€,€´.²ºÑ€¾¹Ğ™\0¿T˜à!2áQHâ–\0WQHp˜kL^¸ÚÕ\0Q	¶\$p™k+®ö¹²Lk^ºk¬n±î~l	Æ¾él…ÖÁÎoë°`#ksO.›Bo°VÃZæl8çÃÛ¹´„'€!ëzd.ÀÛìPÖ³@'k1¯ö³zÎëy®ÇšërMEºÌk±	š¿Õ¯ğ\nx^TÙ°Ä¸2äÆÄÛì3²À§\nÀ@\nGìA°.Ê»l±V°ÛëËæC\0\\V¼¥*ìm²¾³[2€W‰	˜\\kK®NËØke­¦¹Ğyëq­Ö°šŞë	¸[-lÁ²›[\rìË±fÌûDB•®«›P¬€‡®Î»cšë»³ šğëÇ	¼ÃšëÑ†ãŸÂ{¬®²úŞly¬æ³Û(ëu²¡J»Q\0¡¬®¸{-Õ²ó›[0«\n\0~T×N8	:÷ëâ~¾zú€‹¯¾Øılt~¿®ml²†Ö°«kR®\$  €“­nËùké­Øzüm¯æ¿Ûe€™°ÖÀU	¬®”ğÂa²`¸elK³K )á§†c›@\$€§Od'xkN&±Ûo”«\n,(úÊì‘¶şÄú\0ªmGN~mø¾²¥ÃÕ	q[Â€>·eí÷\n6»K;ç²“.{LíW·H‰a\0²ö^àÛŠmü®É;ìaQVİ )°¦ä;~ë¥·.ÛtmÕSvÀeÃÂp®â[qnE®–ßûpm·Nå»„n_†.ÜûHîS·^¼õG\0“¹şç:Él8\nó¾pªkQR\0¥Â›\ny<;§lå¯åOôâ9µO°	ôü\0ùºÖèÀ)k	¦ìšÓî™…æÆ@>B¯Q]?fëS	®¦íãµ^î›\$ájÀIqNmB\\>éõIákO 	{¹S‰¼E`)î¼2X{7ë¹ºŒ*°«â;º´)À “Ã¼vŞûdnº.ëôûÂ}¼Æºp™îÏ	®ÄûÎnÕ­NÉ»;oI²³›[œBg	ÕP%Å¥†Ë”)fC\0…½˜	ğBx†ñàn¥\n¶ê›Ên±½Ô'ºÆkRø›Şl±€'o“±~Æ;¥‹¾~ó #ï7¼îì0Ÿm]».ô{íïON&õ;¶ï½°&Í[6o¨^õĞšoÇ´ø\nø¥‘³«.\0>k;¹À	\0>SìÀN²[2ãN\$&¦€™	ó.¬€¥¬‡\0005Fì“±x	€*î!¾p	@'ïâX	;½TSP®Ñ0ª¹µNx	úÚk»ş²xp)¬*¼a‚9®ã\0,pDæÑià>S±®ôÍÍB±¬Ù[d\0§	ş<ë»¼ø0¦o*O\nX¼ïÁ¥NûÖğ	ı8{Õ%‹T&ïÜï_Â9q{Hìë¬t'øeëE·?õI¥‹ÁúXºñ%…º®ö4òğ¸¦Åø^á~–·Ûƒë_NÌ(À)pgÃ0æ»cmgÁˆü5î(æÖÛ{do¬P£¹µ\nfø\\ìåT&ê¼9kO¦Î»æñÃ×u7a MR<+pó¸¨{Ğpoºò|o‡Ãg;ÒğÄÆôöqÄ‡{àq+º¾òÜGëÀVÔÜLBg	ç\r\\Oï;¿ÇÜ\rğ•ÃıQ *nqÅpæ°Â¼g Ó‡ÀW\0<\\q|d6½âÅîò€\"nIº~æÜ[q‘Â°£Æx:Çm#Å¯üLlÆ¾æü^ñ³\\&|^€¯Tp	Ì¸pãÄşêºĞëÙº­Q¼ğÆ¬(•Iï•®Ÿ\0>l‡Q×\0Úëq}ÀO|{qËSwÀ(n¤–õÎ~TS	ë˜‘ğ¡¶Ãœ€®G;SˆØ	¬Óœçæ\$;ñıSfß@a¡±ÌZélÀşàÜvğÁ­>;wlIÈöü~ÓÖh	ºÙ¥‰O`	›·€—¸7Â²á¬„'›\$òmµ¨	ûHòsÀuHn~9¡­Ë¶\0o¾şİ<’m÷Âhæ¼ğ×Ê‡8[0ÃöèÛ–«†®°Tü%°&Nmn=½o [9øË‡•ÓˆÀNïÕ\0%‡ËG*;›°ÇÖÎ¬\0«¸g &òÜà\núÙ€æÖÈ».ë–Fİ»ë#NÎØ¸lS?+@må´Î|¨îIÈîöà*\0®.#ZÑòN_2¼Ëâ5¿3[»¹øÀH;ªğ3°4&²ç·\nœóC°˜ÖnsËíAîmr{ÀH\nƒnÂË2:ÿ¥ƒ°2Z)aó_ÍòXN~s†–*Xø%ŒËŸ7;hsƒÎ5A[±²âåPÀ>½³nÀõ mBH\nÎ~pİ²îÂÆBğz üÂkÏ±úûÓ¼o=!óÕ…•Qºâb=°&<õóç¬—={›såNÈ|òì1Ç°\nœşÔÙ\n@sóÏ9¼ÇT‡½ÀZÈ€‡±–İ[¹Ô+­öë\\éBa¯rXp¬nÇ\n_Cp a—Sg\nÛÔ¾?õîİÍ.À0¥Ô+¼nÿLğùÊ¿¼TW	­E8ñ	Ïşà[‚BkSpšÙá™ÑßrwÒM•4oSvìúÈlß½!pÜí'ÃW:»ßï%½ŸdÂt /ÂŒd/Jı,òc	±pÔòtyÒèü˜ÔÑ	Ì*,í%Ó.@!ìë¾°` îI¬…Fı,m½ {Øk'Ó75†CÂuÓè	Ü/tz\\?1XhB¾L'\\»€™ˆŞî¼Šb;\nMİ0ë}·NÀ8‘u'Í²\0#BaˆèÅÅÂ™¿—`*\0iÕ\0	ğœ\0q¿—:½îÛÑ¼uoå	à	»ùs'T^²°nÅ…¶½\0ùÈ€à\$\0¿±…MºúóKÒØ\n]2™	çM|éõ‰Ö7Léaõ—ÖN·ÜukI¸ÖÊ{o7¸Ö°»nÃÀ%G]t}È]H`î4 ]qıÉßT|õOÉŞ÷;n:.ãü„Ô+Ç7! #k –&={ëyTs›ˆğEÏ˜	xuuQH\nı_™\r³ß4¼Bfş@&\0¿»=9İ5oEØ^Æ\\ë	ÇSü˜€ˆ%8!ôÍNÎØ}/õ‘Ó:}ëíÖ†·õ\0ST5Ü¹mÏ¶¶Ø[bkó¯ŞÙ\0>TÑ»ÖÇ¼@rÅÖùÛ]òc¯:šâôµİMÜÔóK†õımó©Ù&mõ¯±…<›ytÖ)û.ğU¾[éğVÀ^=®bG­ô&õAÂP®Ø;lBÔï½BË^#¼Ôï	ıE»i¥‡Â«w\\d.ùÛ5º¯À öùÅ'*tõ²ãÖ7L”B³Q×[ğ¢\0‹…ç!¼êïS²Q{&ö£SÿO:êw#®«.{v…ÈrÜfÂ‰®¯`)qËÕ×rİ™€ÿı9î«®¨üúsûPF· \"wQ\n?\r}Ö\0§\n~É=ÔmÓİWa¼vUÒ.¿¥Ãô…Õï<œïã°(=²á°Æ·ØŒï¼iUe¯ïûór?È#.;Üì‡²/Ü¥qıÂ–zßnqËÇØeõt´&\0*î9ß@\n]á§½}€,õéÈ~#]úo§Í¦ş»kÂsÎ¸€,âGÖ//U!ïë¯|'›®í¿vã™•ĞÅÇ	rÁë<&ÊÓ…°p8@‘\ncZÔ#˜¬ğàZ\0Ã-1àùs Å¬í§ÒÓß&´à,.mT\0L**€	Œäp¥Ç&y@ „­>âÏA€Æ~2^c7Ôÿ0<(„:× 8x†à€<ä°çâÁ è¬ø/À<§,÷ŠÅx‡”\$Hkø®ÈÀKœ‡‹¾\0Ò7‹)ÈxÄ7‹µ8øÊö0 ÂRÀ±bÏ…*èCâ°ä‹L.µWSaD\0ò8 É‡ 6æÆG\røÿã»Ñ~?ä³>;¥ã˜+4ßœçæUğ€¥ÏûôòÎm\rà\"\0…­ø2{wuc\n/]«\0†˜\nÛ±÷ÛÈ‡D;:ÔW\n6ğúà0Ôë.\\†ëzçà	ºàôËäì(N~wSfù¼:m+³ï›ywÑ÷+œÎy¹_—]ßù‰†o\r¾_ôs¸)J¾aù{æk›X[B‹æO\0~eù}¶W_{9y¬G›^míæ6²ºÌU°ãÂzáhçğŠ\0„Îà¢Nê'nèö¡D“T xnOcÃç˜/48„çª\\~€çà\"Ğ@5úÃ&„œ—ìQ^†isèYØæf…ÑZªŸ&³ÂahÍ=\nša`;4Q3@ ¹4`1Šœ~0VJŒ-~\"Aùí\0ø Õ*ïé7cA¡çĞÌ}\rGã`C`/˜àà¡ÎŞ Bºö6oc ±OB:ãé(C£7³Ç©àÆz)éØN^<Ù›ãí^î\n¸p§†&òxb«G4Ïê)RÁw¬öİh?†5·[:Pƒ†5àXà¢åÉ‰'OVw®UuzTAPÀ>³\0ø¯¦à€úaëÜ<.~'–‘>‚/è8 ©‚ ˜‰gNé{×('\"²%úùHjŸz8r_¡\"\0g×(4şx…séˆÃß¸ö3ºHĞøØ?\\¨Ğ‘ç\\C’\0ïãÌ6Æ3Éï¶AYÎİitß{rî”\0%K;\nîĞ^‹‚HR¨[\0ğú\rwˆ^ßVhPI~ƒiî0B^!{ŒU48ƒÁ\$5Ê*Óé÷¥Şë˜Ùî×Š@ö	Ùï\0òEoG¼€3g®_½>%,0LÙ<İØ=€©ûæ‰  ,œx„#ç»‚¦f°6—„ĞbaÉ¦†ÎOÀ¢x„èPàñ&3pK%“&c'½ó5ïQŞ×Áş,®l9ÖH~ª©CŠpeK±'ÁÿÿÏˆIåüW˜3üÆ6{ŒcgÅ ç{âÊêø²‰‘?ø‹ğò× é¥ñÇ~ş†ò*¢ÿÿÏ¾¿%ú—ğx*~ü€ğhWˆŸ![néÇ½õü	ïXò^÷,íò÷‰9,{×â`Ù‹gçç¾f«ì\0<Ä9ùàj£‚ ú	,&uâZ,ğ°’gçaèÄS€ÿĞ’dÏ?@Tæî/Ïj ¬•ó¬Dx6  >+‚2€9¿±C’2¾ªŒÄ<ú]qóé–^½·pdOÏÁ³ú¦IIJ¸õŠäĞ^öD…é(8 †@°|\0Ş),Ò;7¢Ù\$gj×»B†'GéhŞÑYÕğ¡87}‚3pı8›¤PğfYhvÎÚ™­XT¯¯h\"M©J«÷&\rê–GäÕz¥“[ºAšAÛVîú|	«•àÂ{Ø?ÙÿQ}³¥øïş…lô«k<	Ø¨á«<kà°<H]}ÌcX\$`›z÷HÍÀ:ş\0ë‰šŞßh]è\"_~„Éí·ÎÑüàÇ´i€*|\"ÄAIª2³Âjz#4˜ƒºI‡…&3wãú#Gò›¬¬Ô¼şG¢3®+)&\$±‹“h¶aoÇºOîÛÀ9ø«â\"\0;€ÖœG¸dV/ïÒ@5…ÒR¨\r£gÚ”\nŸè¨Ë…Oƒd¨°˜pÙç„ Wê&„Dx¼ª‚éëä®ÿªÁ\0\r+º_£û2°<Sí~—ä	3J,§ú•¬b}ú¸»à©ş¶ ¨*¯„=óx£Å|OîP\0004 áŸÄiGşgç¿êaşÖÈ\r¾êÿ	ËŸháh#áOÚùé#OIawŒÜ0hŞŞ(ÛºĞo)y‘+Ozcâi^:›~¿¢«=T*''ûxõ§õöîúè8ı¢ğ‹ú¿¤\"ê9ı¹s¡w„¹VsºK=~ÙıøQ~ho×FŠ7yI¹ùŸBÍ>ûø»ŸGúÆ°.µşÏçâ&ÿşçƒ×ÿÀ˜pä†ÎÇÿk¾.ÿÊÏü`19ÿ_ı 2áÿI¬êg¾ÿ'!şÅk¿ı=Œÿ}ÿëó²aÏöà\0¼fĞ2QÿğÉWüĞ_Øˆó\0	ÿœ\0ˆ\0Oû ?ì€ÿº\0ˆ×ÿÏ#G?†yõĞkÈ0_ï ¼‡k\0”#ş·‘PK<@*ä)TCCôB‘á@3¬z]’Âµ¬HƒÇ€Ÿ¿!nbÖÕğ¤š›â¯B~”¼‡-~\0©9	u^ìßÌBåšó×w­0ÏMØ04Õá@ä€¢–°TÑI\$|!0@Ò•2bRB£/¾‚\rŸh	~LGï@ˆ -¥\0Â‚Lû@#£íL@L%Í÷tÀAğ 4+Ê	tüh\r¡¤ôPOM=.Àî#9ÁOÚàF>0\0Âôø/qÿÓe &;4Êñgh\r\n\0‘§?Í ²€€Ì@äÄ9@œ=4ôü¨ÃâÀê@†àJ@``ƒü‰‹Ã\rÀ4>ú\0Î’áX'Êp!†7@»ÿäĞ?XÏ@œ£‘‚Š\\\0²a-Âr@Ëd~ûÀ9åCé… 42?,”Zb!	„ıYëXªH(`t@¿G.l(F÷š—@ñaà¤\rØ/OË%#x&¡ÅøÈÍ`#; 45* *Xî tBÉ@\0ÀËjTÜ/A£°ĞA@ÿMj•Àòj-`8²o-ò[- \r‚ø“ô–«>NY×\"ÉMà‚R, 9 ©f«á 44YuÅ*³ï¡ëĞG &€ØBòX)¡yğ\"	À‚ƒÍ,³ïÒa\$ßÀæÀË#ÀôR¨3¸€½¥\rf;†’cÇÆ\\…ˆÄq‘Õ\0¶\0µ)H³b•pX\0.Àø9ø\nÈçüB40WÒ”µ°éøø,)\nAh|Z±¦”®\0A†ÎAg€™dWÛØ&›P\\Ñ‚áˆSkaJ¡ô+Ü#ªÒañ<€\r(¬ƒï>Æ}å1’ùQ‘[ X‡S\$ë‹ÜØ.À½\n“\n	÷j¬ÇÍ0/ˆÑü‚ì¹Õ( 4§‡ §Á\0àğ@%‡İ¡ »AOd¶´3ÓCJ`l“}ltR¬¸,Œ÷à¸‚'À8Ôâl›ÓÁ‡~îú–4ø4€© .œjTÏ~Ì´¢=`ïÁÙƒºş	¼\0.¯Aá@eƒ6\"pYÀ¿°{`Íœ@ x\$R¬h#/èJÁH\$\nL.°\\Ä‚‚á¹ìøEÇ¤p\\[¾ödv*ZƒéÒp‚¡Ad‚c:¼ wÚN†Ad¬m:\$rÏ‡!Ä\0áÀ†S&ÃŸˆSF4ÚzÆ”p	¬ğ!‡q×=ì„8Tqõ\0Ë'ÔLr|’ã„nJZpwßŒ†…\r®cüÎÔ\r“>¡l`Zmq„MXT&ŒuÛB\$‚Ô;æhÈ˜ å‰˜Áp\nè)U[O¨!DŸ7“£„¶ÓêiBâÜĞr’”³4|øx, FŸË¶…B[NH—äÀ0\\<Ap‚èYåD  Åb€ƒBÿ´:4 @‚£Œ¦¾×j€)b¹/Ç¢#²a9B „Ú¹©›Ğç¾ C!JÂrjc\niè(R ß ²B[„Y@/rğ“ïá×„…è„\"p\nœ&À°ŠK;B²V¬F†\\BOéÇ<+@pYÁA†…têT+!©Ø¡aüWEşQØ@ğ^AÊtû¬ô\"€\0FÅgAp×ÀœèàiĞ«ßJ©—}!’@Q(\\Ö\0d…Ò•QéÆ¸0‡R”²\0ïÀØ³`<OŠåÁ„&÷¡ğt/Ø,Oáh		×šÒ-\0!0¸s‹†sbã=`K€qQÃ„O½\$/gP¾¸BÏ…Îa/Ámá`!‘\0‚àÊ à D·ÈeŸiÁìò´~+H8&ß\0_ñ˜ ö°5çƒ™=Ë}puiöQ€ÍÌr8C†ˆYÙ¢@—â@ø{j–XéÀG\\Ck¡¨guÊ¯ò¡d§ ’ÒBb\rr“Ñ5¬°ÉRAz€®\0x¨lFaC`H|ö}Šb(Ğ!oÁè“\n!q\r€al(/\r4á°BË’øùò³ß‘iPÎ\r¿u¡ä˜Ø\$¡F&5‚¯\"5´¡J‘´Áİ†\\2Q™d†£aë€‘‹§’ñ`â©úa Àçõ›;X8ËóŠŸBphwåõÛ&RØ-ßÌ@‚‹ÁöëPk°jd½×„ÜúäawÈÏ	Ë&‚|±´Û?÷‰I\\! Âá„ôúŠ\"\"¨%tŸQJuœGÄ×…àú•@:2[zñd§É¡ê—„CäÅ cxĞ—‚O•€yXòôÄ3#CÇÊgö©Ãé>Ğâ J(~Ì¢ÎâcúĞî?L`!ú=?…ÉÂ,¸U/Æ^ŒÛ‡åÖa˜à‚—ÂDölf°4™Œ‚\"\nÁdÊùú ê['Ğ±I…4ÂˆBUJt-Ào¾‡rCˆHÉmı)–hÀu¢Àâçê Ø/ø„ï#\"ÀTˆzüÂ!;41qbD\$‚<D—BFmQ¡\"Cü&AÜà¤B@Eï®\")Cu†8•Á¦(ø„ïYNœC6ÎN!\$Dˆ„í_ï\ryz^\nØ£Ş8Ro»Xî…@;%êZq&Hğë\"5½buÂÜGS{ÏT¡±½E\n†#‰×¤`„ÕAÅˆç5ûcr0ô¡ÊÃ¦ˆíÔ àhD¿9\\ò¼Hè¡›ÁâI\n+˜ƒ!›¢NÄP!‚ûš<JX4©Õb\0BìD:\$t›°jî2…bü/°ì©G™Â©dA¨ gŠĞÙ‰ˆªqEÎ@z·¢h4\"I¥‰X&P\"™OŒ‰¾|§›éfïSc¾ô}lwœF¥PêÙtÄÖ-€5õJ‘9¡™?jTu\$˜LèiÍJ¡ ÃÏJá¨şÌNhr±<ân{úuÅé	hœÁÊ‚¥à\0ÛÈ\"NgŞàs`»Äü|¦ˆ)ÈŸâ\"so‚dô-©Pp¨Ëa×65šT&7³íJŸfDŞ_œı\"&ìH'ğpHÀ\"Iyı|HøÑK_˜DŠ,4&¼G‚Ma›ù@ Ó`˜tS°#häAîş!úDT\"\$‘Má°Ä›ƒ½)©d¡š°2¢šEC‚ŸÀ.ûÃ€&O¤lAuz¥iõQøCèä^ÃÒŠÇ	&\n˜E‡T¢•Ef¯‰ês;C¬ :¹¬ôQü”.rÇíK¢=ˆ‹,–\rñïC®q@	9Ö\rÌÀåC¸Ò¸E`†ìPh¡oá„€¸ûLçX  `â£ÁC}q:,B·‹0a§DN‰=†-4J`K(ä`o+,ñ¦\r,ZXYTâS?˜‹ap¼\rpCÀÜŠ;ˆœª-qÆ°VyÄ§‹IÖ\nXè¹BâJœxbôô\r¬X×ï0éá§E;‰f€üXºÑC^·‘%„ú^¼‘[Ï¢ğ>¢€³\r0OÑ:8–¯!b€w‚\$ëâÖ£Q ŒÄŠ™*ó\n`º±w†7\"cf‰È%C¨&Ñ\nÁ7{‰ŸĞĞ-S° Xb'„ŒhĞtZæ‡px£¾å€ÛáYõxÂ±OÀÆ\rImüÄOˆÃĞxà/F\"‡m(0„Œ\0¬ÊÆ\"¢mò,;òÊ\0ãÄ4|r} Y1ŠÀ#\"b‘Açcø\"Ôƒô\\@0‘q“ôÃNŒ	¡Ü\\\0Q1ã#>SdÎYª\"Ôà¦\0ˆY§Aöí8GP#-2e2	êIÁHË¨§ L‚¶[nûÆàæL	` éƒŒÙŒ	¸‰t—ÕŒkŒŞ”¤ÌWÄñœà²'ÈE¾\0„jíÀbP! 8jŒ†´ö	I6«ÀÄ*’î)'£ƒ”ÜL;X¤°ïX°±ŠjÁÜJHUï ²@Ä½…\n½p¦ÌBC¡© MÄ ç™ÏæmÅ/À8*jtY_»`\r­^‰©D#µmI:»V.ìJ”¡ +RN°ş5äi¸Ôàc#J@v,Ä)(›(ÓJQ#]FŸb¦Â8Škõ{±©#X¶b&¯EŠØÒIG£b,.9‘ìh#DØQ·3±™c\n.©cpG,bA.^\",DLf‰× ¸T™ğ´?c-MªJ‹\0_€­hFë\"\0ˆ¤ÈŞğîÆóhªŒˆ\0ÖD~£„ÇeY\$Øõà)¬€#„œ®\$j8£-<*^c‰²Sgìñ„;–ylíã‘3ö#BËB9+@æpìÛÁ{Gh±¤¬ræ],óaBÉdÑ™•[8å1ÌÙ•G;p«J9¹—æ•,ø•GAÏÜ9<çÑĞ£AŒÒ¡ädt¸èğ‡ã©4¨Ä-)ùœuVS\0_€y´Éx²+6JLŠ™å‚C7£=”ÄrHí—îgcRÕ®7oxÜã}Fèúş7ünØà\"2`G‘äD+³1RaaX±´Oe†¨8áL¸™/}\nQ™¸5GŒ®\0‚˜dè;°â£4R òZ#dòÏˆ/sJ¶œM5—¾æHF†\rh<åHZ\0¬Cüe‚\nåÈ•TqÁ_‹\$U†˜¦;©Æ­±¸ØµµqhŞ\0–£–®Ñ¶š¶5z'°;—_-ôÅªtîŞí¬Ğw|.Õãæ¸WrPÛµ·{&íºšÑGÑ¦KÛc‚ÖİÍcœ7Èsnäü9«µq £ó°¸r–Ø½Ë„‡.[i*Cr¦æmÉë¸§3l2Xe¼Åtä¨=­¦Ş®çª;Ña¤ä­¾ssgÑõä¸†B^§ıØ³vmÃûÆsÿ IÜvxÿ­ó¤	:Rn© uÀÌVìmk·Ìt IÕ²éN	d¸0mîİñË¹€¹N.Æ·hHÖ?Ì‚×ßd8\0ŠÙÔ¡™íŸÈ=qxİ²B‚æüh[óHk´ÄŠB3d'f]»@rZßÅÑ¸ü®’·pŞ	£’÷1Ü˜92SÖAÑC‰ æ²ä:8ÔâEÁ{z¶ÃÕ7;Âêé*C|—.ÛĞHtm!¼\$‚Û:qŞ‚AL‡',.	¼7 rë!ß#z	ˆNê· s\"YÆ\\ˆ¨üRĞ!Y€İµ½¼‰-ÏÚ×ºNŞØ¿xÙíù[×È¡\0³!A½~™MyÚô·°sR¨©Ïû¦×MíìÛØºh¡!­³\\†ÙÍñ\\AÈqoÇ!éÃS£öür›ÙÈ¿\0W\"\n{ür!d7ç‘ßAc~9òdfÈÄk,ÄŠA«~y-øÀ)H™oÆß	Ûôyîú¤ ·çwßED„‰Ò+õHÎŸ#uÇœ‹&ır-[\\7îk°„åÎcùÎ§]\0·õoîß!À\n7_Màç8k|ïyËÓ…3NÄcêGëB ±Âc·gNÜÜš96nªå\rÒ•8¤‘*\"nîïBG+¨?ín[•±Sğç™ßCi6à`ô8	n€Ö®BT‰7\nÎÛ:°ÊlÃ\".Fú9œ70½mC#:IÒ¨i'’Q…*Æğ|`pRJsÜ˜ï±†K ?*‰vñ\nJ»åWåHNZ¹ë9´iSs`i)Ï³}–ûAöcš7:nfœê9Øs:æ`sg7î:\\˜ºor€ØYº£¿GyèS[ç1%†çs;÷‡ßÁ!póÍ÷Ãô0jÜi·s¤æ•·› G5/:‰È<ì6\\Kô6{Ñ‡²dá¤C{:û\n™Ñ’Ó p¡Z½¥ÎÊ¡ícÛÄã µ†2Qí¸obÅ±D=º{zğ:+³ÃµW!’=ˆŒÌö-ìp;Y8!á^ÈFfƒŒ˜Œœ(;BŠÇŠÂ÷¡îSÛèš/£ÆIÌz¨ıÁâsCO]^B½G{\0ƒıúĞbÁÒw„®Ú-¼sì˜µÄì^çzˆmê3×§ñ/£P`424\$sì0ç«0Ğ\0|“ö”Ly.4‡qQ\n=]z¸NİëŸ¬¢€^· 4öøXsI;…Š‹½\0Ò€h¨»×øÈåšŸš=üxû^SÅÇ®WâşÅ_”DL9ôaÏÂ¢åƒJ‹¾7?òYé\\¡GÅ’VÂ½ÄŠ¶käåOuÌCÀ„Šıëß»¡¾ã&×9t)&pÔÚr‘ÁÀŸXÃ)ø´¤×í>_¥ê*7(éñéôpÏ##ÆA”°MEî#ûÀ'/ğT;4V|N©p\nİ×÷#Y3ˆdxpş¼\nœÃ“e7I¬Z¶Ü<³ÁG¦ è\"KğéŞ‡ö°ŸjŞ\0Ä\$…èğlñß,ç†7ÂÜ‹6#8)6—ï{%IÃú„?*N+[>Øbe‹Z\0s\0×éâëÜo DÊTóä\"A.YL1×Ro\\w*±øÜuÈ¡ãÅŠ'NU”—«om¥\\¾/xñ*ö	„g³Ño‹å\\¿%øùÀƒsğ§áÏ_…¿›•˜üF+PegŠÄÃÁ,¿+*|L©óòÑëÒ¶Z\\¿0xŒŠÌ/ ïLep\$%öñJW+ñ)\\¯Û\0œ£ø•ÊÉ×,®XX¯å%y5`xbIÀëˆ‰]\0OMï\0yx¤ü„Ût°ä²¶å?)~bÔ)ü­§ˆÏËË)?Ó Ò÷lT«ı))²TàKC{İ4a 9bà™¸š(õHÏsİ‚4ï¶“‰ƒ}ÜöùöóÔ¶¦2È QEc*ŠY<Øä?†…? –:Ì¬ç\\÷İ\0“R d^€XÔŸQš»\";´‡Ñ`²L±X½PãaÎˆ*Y)“ü´À½Ãñe¤½‡7-N\"‰UÙÕáÎËY,•úZ”µÙiñHƒÂ@Í–Ã-:O¬´–[IU íŒ´û =p ÷†}Y?Ëp_-Îû,¶XÒİ¥¹ –ó)È	QQ‚ÉRÜCØK9Œ{-ò\\,ŸQ=2à£*K}8)	¸hPºpÏ	…“ËXô4Œ:œ¹7ªGFK;Iõ{øM¬7¼¹¡¡ nBaK™—<õJX‹TêànŸÁË§‚!áºuÏº@92¦}q.Íô»(áI\"îÄx{>	@²ZIÆ—¯£…°KÁ9¯/\r¼UNrñÁrÊ¤–1Ä©Èğ`r%Ãô~g\rv&ÛÛi>¯½Ç|¾ôPã/lsİ²41¤ú©‘‹ÒlXD¸h€rùÀ5Ëé—Ëè‡´Ò}d§KòÒ9Ú\"Ô¿Ib’ı¥2Kz	 .´ŸY,yœ[—\r0ËŞ9~…è`óÉõ—}06üP¶v±cà_Àøƒ:>NÌ»²…Ñwf\n>+kÁŸüÁ8²}BÁÅŠ˜#2_\$ÁSû±3eÃ–ã¡öÌŸY…Ì™ÈÅE+‹Ë\r]ÜÃY†qE¢ë¾û—0è\$Âù†°5æÌ-˜ƒ0Ñ¨ğé†0;¦#Ì<-Y1*%DÄY†Sbô®ÈöcaèK±#HÇÅ\r<|ˆñ¢­DĞÓ1<yHµcŒ=DZ˜Ñ1– y`ƒ€ˆàùt1À	W#‚“ÀÃú˜Óv%èù¡ê&2L}\n%¼H°êL€^“Ì|\"I1Şcê7Èƒ@Í€½£™ü.dCÉc¯;ŸÌ™,\nd@MÇN&M5*…Y2^e	QÇÀpò¦AÌ©™Rö%èT.ÀqQ_¥@•A *[#Öñ4ñ%Şİˆüéó0Q-,¤æ[ş„ŠÇö2d÷Ö…û¦cÆ@gä¯÷ÙEªâ,ÌÔõÀÿl¥xÃS*fQ€e™5údÍÇÜ“)Q¼B¬;üÜì8DÆ”ğğİ?„j\nÜÖãã¸Æ°ÊHCÌóI*ó@	H0%Ş\r	 	ñı„²?0ÅbYŒ÷{?4¨`7ŠQ,Ş³zm¢f``'©q_¥éÂyˆRø0‰*0I†³-bÄ\0\0ôêk%ˆ4¸b]Á‹4d{>§ €k¡ûÉfƒr÷ŞU|PÇ çÅ›¦Hzõff)³Ó`¦z“B›Š¬çŞRaŠ£¡z|Ó%í°CÒÏCr™°A¹|ä½à„PÒUuSŒšTÉ¨êèß\$×FG	š¯qûùÜíG?©\r¾–YêSŒ/œq!Á¾“Aÿ”ûOä®9&¶¾RŠ’5Øi§ŒœMw|h“‹Äi®ĞÈæ¿ ÿg|	†øa• m\"õÃ)\0ÆL&\$ˆ=ÀQ@‚ ~o6>\"ğe9se•<øxl\"lÓ‰²DrË%?*,\nïóN(Í0ˆÒÁFv˜@Yãã?Æv°¸b\$\n9±,öS‰0NI3>vˆ´®]¬²©f\"MÀ=4	³Ş9¸ÑÀñ'Ù—hŸhôÔRS\"o[åR\"c™Ô*0`ĞW/A#%Åî}ù•B„˜O	 @ˆ¯«2üıÜH&“p£Ğ€ÓöÑÎ°&³{âs¼Rcù5!ô¤‡¯#7b€=¾R”r¸R_‘]&¹jóøÑgS^fJ¼Vš+0°@³i…†ÿàøD€ÆÕª\n!„®OßÆ¡¯I©T\rãÿ¯Då.ƒüšÉ¥S™0GÖ‘ê!¤Àdööpc'¹¡q‚Q2œ`à;4I÷¨SeğÌ\"€½fUİ¹šÑÁ^>´š‹ê*Ò@)Gğğ±eC;{rˆhL2‚_²É¢ÕÍ…›Ş&. ğ:a™\")ªqœ³4oÌ™Éı‚31¬\r¤ã™Ì£oàğ„û”á8Âk¤Şx##'8ˆ‰œa1²q\\˜A¯xàŒ—Zƒ:dq„\rxÃ•ç5–xœ,Ú	ä	 µ_7ÌDêıIá”ò×CáÔ½@ˆV\\“R¦Oàâ”FN†v…èœQˆ›¤Úâ/Î,Hœ¨Ü4éeïDæÃ\"„æ E©Õ`ˆ#-zŒÏ\rvtté¿ïRçTAœ‚Ì)Tüe7©ü¦®yŒ¦ÍxÙ/ÉØ1ƒ¯#i0›\\ìYÙq¢!\0e;L…Ê½ĞHò¶çl=K\0ã;HA¨¦ó³â\r?³/X± QæXI¯€´reSÑ€ãB‡¥²ˆĞKöwœê@6`Mç{<ó›Ö0ã7)Ş\"fŸ½\\Kešp°#§…@²ÿö¼ğ³¸!â¡xÏ\rÄ²¬ñf§ì´æóÏvŒ\r„™–é£#Ú3–¾%Ñè´¹aÃçp@<4ˆ´³=–4ï¹’o|b-=÷*8x/Êø]å_YÏ9‹ù&*a¼T×îRÍ¢MNƒ;fld‰ÎÓ¢ñ>~¤ù™è(bsÓbŒƒµ€Ú,Nh“ˆâº±ÉI=,\\½ĞQSF¦bL¯ˆÑ7ÕâœÇù–ºà(nÌ \"%ŒØyí3'µÄ±‚9*{|Ëø@€3ÁtA7Æ{ä÷â@naùA\n,=õ-‹Q™ğd™(>'§Šx4(\"¥ÈOÒÁÜP›Ùù¾óåÅ®AWˆ|´gîSèY^>l{¶È<e“åDHÉF%¯Ë6‚5è°ˆ¥PñpûÍWš\n89le±Ó®ãÀÈ¬¹’¤öÃüˆgg[ÏBŸ‹>\noŒIŸÓ+'å5-´EEè`@õó¯GOÑ7?NY9úpì¡àÁ&Q?iäÔ6lOîÅ1Áœ¥Nw´U‰W‚%åÍ«˜²»®4\$kÄ¢±±VÆÇXI\rÎ4ËE‡Nz1Paí8LmÔ*òØ›™/@VÄ0Ø \0		JO÷J(›~5D|†Æ\rÃ¬ª^sÅ‹,mf,ì_˜µ&ßNH†v6êÂÆ)Q¥èOùß?ì@äÿÕv“ÿÏ\0FÏ'å@6£@XŸ±chÄ®Ş-±¸¸±DC:Õ‘‹¬møø‘ÜZ¢¬,J*Ñ\n70%8İ	Ec€GíA6üwF0”+PLõ\nÁÕFVlƒéÃv_¨Øø#\nS‰Z>2* ´r¹e*§+˜üĞf ÖBáËÂ*â\\3dT©Â‚ì¹ÆXl h3•z{Aí— <Ù>Ğ| »;&„#9¥tñîX¿Ğ>)7Í8ßt#ƒİ‚]\0^	0ÛHº¬i\0¬P˜Q^„]ö0	DÙ\nĞRc5A-6üpËÌn™ºPX;°Ğú4)Ê”èGà_¯Bdz¸øm^ PQ‘!:B,…F½®Ğœ*u?!Í*£vöNFÈØnñ#ÂB,	ùÜOIE\$%Ø³¸&ÇÎ‰bÉwò©ÜT’6²KÜÿÈrTâIˆY&mä7µèpê)¼câXÒ#å92Ú¨®IûgÈN9[\"¶pKCåµƒe¦¿Í¬[…¹àl¾Üşˆ’* M­[-Qmhä¢BciÆÍÍéh€¹ò¢×ˆs`6ıhä5³ qØÛv7^ÍëÜÔºt6éæ?û”G1mcÛ·*Au¦	ÑB†À&\\›Ä;yéC³¤7p®“œö¹äsÌé=ä£ 7=\$ÜôÑBsôßiÒ¬‹ÇSNêšÁ¸«¡¢©Å[§wRŸİBH†uê~Gë¹—qmdÌÈ_s¸K\rÔÓUMV:®p0êÅ·ûfóÎ®Üjºôr&ëI¾šœt(n\\ÿ¸%meÁÑó´g[\rëÜ»_uÆã…Q®6÷.cİã7ÎuÜ§×³¯×_.Í—:‹kFìÙÎ‹™§fôcœÉ¹Ô\0FX3³§g®¤»LpTåÕÚ½GoÎÕY€|sæ•Ò¶Ú*Ú[GàbGF©Á«…t7Ğ»{Bxß¶?¸·(d@Ql¸æ•¼d7 öİõ;åué\$ÕßSƒ7~ÍE=mîñi!ÛàR3bf“b<ô~şóĞt5¶}Œû²—%úúì”sÜ	µGâ<¾e*&¨/ëÛg´i¤Ê1•ö^L’`ÏÂÿ€f†¶õş¿ç×Æ­äöÅ£šõ	éì1±¤é½|I\rÉêÑé6ÕJ<k78üëCÓ…‘f¸Ÿ½“¾øáüÏG‰ÓN\n	~5BWø€Ì„!åc?+P˜Œ\rGÉsæ,À9€w1th%Ú‘±&1Aí™CG~-ŒX™€x©ÀO\"Jõ´˜`ûÓÈ¦cD†ò +™§BÍ ‘Í5}Öt3@93©^ûMa±66’¨(™ö`@„Õ@f˜?1úc*mt[#Y¡ Ò¤Ç.©©tó÷ŸPTNâ@°‡~ÈşLå(–1C§áJê‹˜ún€r\0!o±SÎ±ƒAÄsÕ÷êsÕ>¢†¿o™7ğ1\\‚Är3IbDP Â+¦] d÷¦Y´_â3ëç¾²ï8æk+ë\$1z©PÒR-Ş•+îI¬°pgR3·T ¨‰+Ï8–/Ä ŸR®–·b…Y––oá	8AW''ùHÚWàü…JÌÇ£äØ¬H±Ù˜©dÒ±'€Â¶…#÷M^¨#Ğ@aÌOèèFÚƒf“”…äb‘&l„ãt	£P1 \n ‚–ê/Åv Ø²+ÎYê¸'”Ü¨¿( €/\0»@5^ŠÃªT¼Ğ¦c\n vwÁ‚Û…¸5NÇ4¤Ìo@JáÂ‰¶ö\0æ\0ÄÀã~ŞÓ\0n\0à¨@tÅiˆ\08\0f\0Ü\nØ€œ”Ä\0€5\0d\0Ú˜à€ÔÊ€Ó¦.\0Ö˜½2êc@\0Ó[\0Î˜ı3`\0\r)šS)¦/Lî™õ1úf´È©‡€8¦=Lª™Jİp@iŸ\09\0eL†˜u1Ğ`\r©¨S#\0n\0Ü°\nctÑ)ˆ\0001ËŠ™4jjtËi®S¦±M’š3Jj`)—SY[¯M\$½3ÊeÀ\ri­Sh¦ÃMš5jàES)¦4\0æ›1je@©¶S\\[ŸM.›µ4Zb@)ÂÓz¦4\0Ú™@ıÀ@\rô\0003¦MLú˜4ÊrHGÀÓ8¦Ñ*œ \np”æ©´Ó4\0qMVš-5p”äiÒÓN¦óM„€Ôé)°€9¦=N&š•7Úl i¸Ó¦Â\n®™í6Q± )ÖSV¦²o¢™pzdÔài€0\0kNâ›Ùºe\"iªSI¦qOš-;rô×)ÎÓW¦·MèQ%5êy4å\0*3\0ÇN…5Šu‹ı©ôS<§_N\nš¥>Zl )­Sï¦!NÆš54ĞÔî)«¡§¿NÀˆšt”è)«ÓKOM–œå=\nkôı©şÓ§¦eNz™õ7zı)¥Óp¦KLº˜ı<ŠÖ)ùSiñNÊ™u;`µ\0À1\0005\rMRŸå;jÔ÷\0S¶§íLª›å;Jh @SÏ¦›Mò™Õ7J€ôã©Sÿ¦·>¡mC*€4Ö©§ÓÖ\0mO2›1Šy \r@T§kN®e5Šgtı©›Ó ¦SNRš4ÚŠÕ*S¾§áOJ›-@Z‹Ô×i¥ÔB¦ãNò¡õ1±4Ö)ëS1§wQšH¡êŠ”İiìS¦±P¼JbÜéâTN¦,(’ ­9º€´Æ©”Ô4§)MÎåGZjôÌ*Ó°§EQÖ™¥CJuÄ©å\0002¨ÓMª›•FúrªHST[ŸMDŠ~€\r*S*\0iRNU;Ê•ªÓ+§uM¦å;Êe#bj=SÓ¨[Q\"™-GšfTÆªÊ‡¦ùQê˜AvÔË©ŒS„©Lšš…@@ôÄ*?S¦³QŸ5>Úh ©Tµ§¹NZŸİ=:„u.*Óß©•N¦8İjh4ÄªhÔ£§Q^UA:bõ%éŞT&¨P®›M:ª™´é©ÑT!¦1SÌ½4êµ*ÓÜ¨)PvT:İp¯fê!T‘¨³Pn¥=4šµ!iÕÓP§ÙR¤É:|ôı*;Ó:¦qRNš55ªŒtØ©˜TK\0iS6£=Ošµ>j3T:¨\0Î]IzŸ5äÔ¾ªP7N¤U5Ai•Ô¤¨—S’å<¡ºtõ©·Ó’\0sQ6™F:¤”ñ)T¤§¡PÒ›¥RÚrt÷ª™ÔÄ¨O~¨}E:„”èAUÔ¦iTÚ›(´Ò*TzªNLß@*º…àT—¦ÿUB¨3ºÈéÃÔŸ§¹Q£İ?:v5FüTË©ÑS£\rJšzuj3T-§gUŸ¥DµauR©¾SBªûPª¨eBÚà*tTî)U¥n½:Jª4ñé™T©M5z”òªYÓ³ª…Q¤U1ú­Ôø*Ôª?O¦¨eJújÕJ)§U„¦qLª¡}CJ¢4İÖçÕ—¦ „|DŠsµni Ô#«]M\n¨İ2Z·•i§TŞª—Nv¨=8êdõdª´ÔM§?U‚¨ÕSJ¢õR©ĞÓk¦ÛTÎ 9j¹”ú)šTH§f„~©å\\tõFéÙÓ9¨ÃT¢…:uJ*ØÓXª1Ræ¢3zõOª”S±«RşO:w•g*óÕ¨1R«E>Š‰•€iúS+©QO¤…5z5ÅS:Q¦¥e`zx•m©ÎÕd§YT™-5:—‚ªBÓô¬)N¯mXªŸÕP*‘ÔÁªsLf…Uªb4Ü*¤Ó»¦éN5µ5Jsµ*¬Óq«CSŞŸYªšôÅê|SN«ÅUÆ§‹Ùºtìj„Õç©-Q]ìİNÊbõFé¥U¶¦oXŠš3zœôüéÎÔ¨«KT‚«õ^J •RªTy«mLÒ˜½^Úk4Êj¹ÕGªSÍn½@i4Óª(Ô#©eNšÕSŠ¢UŒ…U§;On-Sªºõ‹i½TRªVî£55šÊØkVªQUr›M2ºÍTîê|ÖXVOò¨ıN*­ôóªŒVtªGWú²¥Sú˜õj+Ó±§§Lª¬½6:”õ—ÁUÕ¾§çN°ıDÊÆàªëT—§gYò›½<JŠ4ãéæS7ª;Zv²u7Z¨Tİ*¿ÓóVU\n˜Å^\nl£~*PÔ¦/QF¡GŠx•«†ÄÖ)VTÒµaJmÕ“)âUªÉZz§õP:»Õ’êëÔn¬ûOî¤EZËõY+ U.=TîªÍ:zÒOëqŠ\$¬!LªœµLJc5WêSÄ©uUæ²;Z‚•.ê­Sã¬§Mê˜ÅL:{”İ+T°ªWXv©ENŠsµj@×\0¬QQ^šı>jÎ•¶)½SY­ûWªÅ6šcU«*\r‰ª1XVª=CZo5ŒjÖì­ıZÖ¢%_Î5Ii¯S«ÑQê²°¡êÂ”ÅÆÄÔ«Mê B\nrTÇªáTø¦#R^™=pºÎ¡ê‘Öˆ¦­Pš™=Dºzµ¤êÑÕl¨‰Yj¸¤¨w³tşêSm\rWfºm1j„UUªSÕë§ÅP\"œ8ÚÃ@ê¼T°¨[Tb°õapU—jÁÖ¾©ûZ&œfjëõrª6S»¦=Pì\ru:q±5kGş\0d®õSæ¢W\n¿TÜjTW©WQ¶ˆjãôØê+Õ?¬!S>©¥8:õ%ÆüV\r¬OQ‚›ÕCªÕÔçjyÓª‰X³iš•¯*1Ó7®/N9X]HªyTğkÌÔ®!Y¾-j:i¢i¦Ö’§KM\nš\rVJiµ¬)ÁSÏ¯N2 ÅDÊåTÎ+\\Ô¤ªAMº²ıKš¬tÎê•S½§0\"®½dZ5/ê{U=¨y\\Ö¦¥Gš«õukL1ê«Lâ írJ«u<)ĞS•¯YMZ AªÊ4ÖªÕU˜¦^%gjju2jèT§…Ov5J¸4ò«qÔzª\n7âµ5dé5°éçUé¬+RÚ¤İW*İkxÖ#­‹Uæ¬e^zíµúêPÔ©CLn„bê[§°cU!/v6ÖUO[[–²mÍ\\u9r%†ÕùÈé€–×-zÇŠUrl§áÎô~æî. ä…;+rÀØÁ{7aMœtØ.°dãÍÀ^†ÆNd09buáCÉÀ]„‡.\$]\$8áó1°#¹-Ô<ì(Qtkùa*Â«šÆöÎÈ·P\0uCšˆû¼–%‡ÀHW° sBÃY\0Ö\$·¡@rŒwÌ‰Ûæï›ÇœX.BnäŞÁsrHıô6Æº)ljìaç\0¥SšS{~l,…5Q\\…¶ÂÒlEºa°‰!*Áë`y­ï@)€Yr`.,İÕ„g4®j[HØ–B‡FÎÄÓrÍÎM³X£Ëaö‡«™»\rJl0Økl,àeR“cWF\\õN\n(ÖûTIeĞğ@r±p.RÒÅfÕ¬HÛ\$È¸Be8tµÃi¡¡qP©ä‘wc6J,}g#![y¹Ø¡•cÆë \nAÈ¤¢ ãÎÄ—ãŸˆP,oHK±ÁcŒË‹²2w7Í±ÆaÜÓ­Æ²m¤œÆ™s‘şKÇ°;\rà¬|» ‘ıcêE-÷6G?\$‚!L9ù3ö.xa‘J®ˆì‚:°–ÕåÏš\n´²&\0 \\S™»–ÛìX0ªÖÄçã[RvHXh¹Ròøçã«‡Ç?\0Ò²p(ğ@Ø¥P	&\\•!µ³±¶ä^É”—'.\0œÆœĞiôğ`!“Å³¶‡Ü³ªCbMdÈ›köåˆ(Éœüp Ü”R­”÷TiÎmIw)dq\nPPMí@\$»›²t\0¢Ê“Ç5§6œ€B’äçR«ÊæÀÇ4\09¼;`÷˜O5–	î5£ùÈ°Ÿœ°k<áv!…*¹š‚Ï*„kÃUánVØ‘Y_vyb=º}‰0èR¬OX˜biµÕ•æ×Nv¤6r¢`ÚéNÊ¥&×MÙŞ]†rŠÛA·K…fÀÎZÒYˆ°yaÍp«VFC¹yqgfBÍ‹gtNF\n8³i\$mÈÄ‘ØıÍ­lVH³räúÍØsWvN€w†ZÛíÇ…›Èûoœ§ĞânÚâÎ{˜Ô(ªvd@ÇÒ{ğfã›©2V6¡Å,–&*ÅĞ¥WG?hXÛr?\$ªJn8VWáÁºœ(•QÏÊ–6\0YóÄâÕÓëÊ;>NYP™:´³ä…dçã¾ÃŸ8ÚÙÙ«G.Ğ‘Ùà\nüZrüà 8#•)	lÛaYşªa†›°Ç­d7Èl-gÑ½œ8c!ì¬6sSÙhq½d†¶HS•XÛ´CbVÄ½Š\0æ¶\$[Ğ\0BBx×‘¾ƒ¬&Ô>\\=Ø5²¯h‚CËˆ§FA’Å²hîBÒ#‰™ê¤Ûû€Pr \r¾…—;&tD¨vZ)‘ŸE&ÒLŒÇîcı±\"\0‡`ÚË½;JÖ–›	ºl»ezÍ…¥Ymrè¥¡1´’ÚâÄU¦+M`\nÛ\n*C²ª¨*ÓëNRP-:ÇûnÜÒÓÛ‚Ößî­=¡U°¯jA+d›P’#)ÚIµeÎ?Û'™¢åÈ†s\ri©±»zÚ–-[UZµ(×ı¶A—I6í4· adÛ¹»ëZyöŠ-9¼ÒyÇ#RÓÕ©‡¶«b·ÂµY%¹;c'k6­Ü¶E±kj|–+—©(k,!¸ml¥d®Ön–ì.ûmY¹j´“æÖ{­»WmœeÚI‘ÑkYØ›g'NV—-l7fnŸkm­›iKÖmKÈoEf¶ÖµŸ‡P–~­OÚ0±?bfÑš‹VV'ZÑØÚ\0›i%·Š–¾-UÚIy-j~ˆİ©û8rC¬º	o@-=´‹·Ù’UZ—oÇhx=Š[’3­9_´KkAµm±KE`mÉG‘¼…bÌm£ v\$[ñÚ6m6ÙÉÖ°‹cÎ<İŠªl´~ØF=¤&vÊÜ=ÚFkİ-ÈìŒ{Lö“ZN³¥	ã^‡–6Í8”¶a#:Ó\$0\n¶—-q;“´IjÆF]—èM­%¼ã¶Im!R§+MÖÆdoZp£wmÓ£|w3vU­§Û‘iõº3s;+ò4İYÚµ\nà¶E¶Qê£»Ú¶'#zÛ©'¶¤í»¸óµamšFõûk<ÚşZ¢·fšÓK~;Tî^ZÚı·¥æSÍ6Ä2	­@[}pÂófÜ•«kl®[é[G‘½júÜó;X*‹ÛîY­pékÀU¶ö²íb¸¾µn>Ñ5 ¹–´­ÕZÕ·ak^İ½­›Kmlí°XAµ¿m.×\n«\\víÀX@µÎØÊİí‚[6Vèl±Yùns#Ù\r¯dv¼­èZõ±-m·\r\r*\"65¤{[·-!JÒ¤¶Ôì-º¥°» ¦Û°„)VÂœDÛ³˜ÕúBU±[l¯1mŒ[ğµ¿lnØì“‹~öômŸÛÓ±· J?û†–×¶˜mûY–´nİ>ÙK¬'4rí–ÚysQp2Ùµ“WA·mšÚKm‘löÒ}¥hV•\$ÚX·ôÙÊÚM®K¶Óœ°Z—¸;mÚ³»jÖ¼¤	[^rwp.BU¶†ºöÚ®7O¶óm½	…·ƒö¢[%9›·pQ¾]¨«mÈR­I9¬¸jÙÊÛı¹Ymªî#¸p·\rqÁu„[^6ÿä!Û‹µRØŞô+V–.\$Ù_¸µnEç¹«‡vĞ”Z»¸šÖİÆvÎhS­Ò5×nÍnšÖ1—Y-ÕŒ…·ZÖÅ»;Z7;®:ÚÌl_n¾ã¥¢{J}ìúH·qqBİõ­«xcnC[º×r.Úm¥ûx—¤!ÚÄ¸!*äµ¸‹Šw­wY´¡rnã„Fµ7êÜ‡kşâ…°Šù\\€+·Ñr†ßS];}–-÷Xî]¹G¹\n³ƒ4%êzÛ¦©Âr”é•Ësš;—ÊŠ€%µ÷³Cs€÷®hĞ¥€I\0“s2â{ÛE{[“Èàkµs2Ä³qàöLîl\0Mn=sVHU¿õQ·€*\0N±|„¼°w;ÎòÛ.»­±-¼PÓº›¤8ÈÈ°úêµŞ›aeõcÙ<lÜ÷.æãfç*Ö!Û¥\\LºŞçˆ{¡\rÀÀ/È±^„ÁÔ¥‹&É6îp8´\\§°úœCJƒìW»¹—bÀKpK¢·5î7TtòVÏãË;`˜mÈºGt]RVç.à•F¸¢t­Õ¥Í°	Ê‚,W€Nt“b¾éš «ö®¡¹îkõsªˆ¤°ââ€';¨°Tàeä“ÉBX­‘EÃÜÛ°VØ‰ëû4(P­ƒ]Y¹Pé>Æ­¡§­¨h¤»seu	…Õk¬–Ñ®—İkqDî-½İÎ.w[®\0Gº8Úµ°Ã¡;­moTç\0Fº÷t~Æãa‡—wY,m¼šºÔÚ´Ì¥Ní¨@!:±¡lî‰…²›Öõò]\0³l¶ì}¤º&É.Êİš\0²Üz‰MÙ+³–Õâİ›uáD¦ìÅŒ;´Š¤W°½´œ`\"ĞŒ9²Mìn:m†ÃFÎ#£Ö³ˆLİH6u!vZí¯+·÷g®ÔÉ‹´ÍvzÄÜ;´·kXe]¯s´Úİäš¨k£-îè8¬tÊÜ¥ËÅ;º.±U4[´¨â®î•¹ËŒ×uné!Yv!t’L]İ»¬V}->·¿±Şè%¼İØp|m)¶¬»æäFìR; Ddİòo7wöìßöó×[l…¹¼	wÍÈ;‡DhSÃİØnd,–+{%Q–C\\Ì:´mÃmåËÃ÷í¼Ü–¼ddûy·xLHÀ&µ÷³zß5İkˆ«RHEÅŞ&mÚäÆÛUŞ¶ç‹.q»æs'xÑÈãG?—l·¸ç ¥Ç5ß'šÎy[·ºnsyG\0Ğ\nm~],İ€y¿DÁ	•äqpÎy.€€(q¤ç’ì¥7=ÔP\nÙ2´té	³–{ËèVn•:\nl§sjğ;‚[Í-ªï¹måw^îó‹Íê§•;à¼Ëy¼›vhÿ/(ÛŞr\0§xñÌp;)¶R.î¡3e83=Ô°\n·•D8]ò¹µvŒC˜Û£NA®\0(kø\"ô£€»ÀîÁ-*!1\rkŞËH¾Î™ZpºØ‘¬s»0\nò­K¼ºî\0¡Ô\rĞ;/¬7/*°Û\0¯\"zGc¹Ö®GQ“²p\0¢ó¢W<­se¶ºTC{\nò­ìËbÜ­ŞÇsÉ#¢ïË`kÙWïiİqº-uÎÌ#k„*­¼î;^Ò³FÌŠ\n6ì+/l€NŸfM­¼·a×a®À5²pu¦Ü-•÷qáïf\0(#\nh»ÍŞ·A¯{!3¼a m¹È™ï4P£ÚTS°¨¡·“‘W\"nÀ\0P\0®É|~·—WÃîå9TZ¨¾ì€Š.4\0¶Òpâ±ÈÅ‚«ä*¬ìÚ*´,íO#ªÖ±Öm(m5¡lifÑÂ-¼‹4ˆìÙ·£\0äb«˜Õ>ö:[h!G¹”Üóí›\nön£5¡r0â.õn'o·|¯h]€B–âêêµ³{½\"oÇüa˜òUÀœûmWÕ]»ßYmöã©¸2›à2@b2	Om÷}ˆCÊú¶à×ïn^ü‘RÜİc¾Æén{¯ª€Q³lÛíQl|ç\$¨N/%Ş€eÉÎëoµ=íc]»ÂrJU¬ãpk+Nğ®9İ	möß¦úeùé×äeİWoà	Øeôç6ˆSœ‹‹nÜ}È+ó÷ŸÛQB¿;gJæË¯ê­Çïß¥s×~®õ‹J—8ìòX5mf×ÍÕk¼Fç.­â¹Øui\$Öòª©;ô.zïÓÙä‘és*Ío…P6y-Uİò‘ï{Fşc+ÀíÔõ™r³÷zOÄ?ö•/È^U¿%{Õßc A »Á‡/-¿õö¡J·øå\$_æ\ró}û-—›…*ˆ–no‚’ÄİAJ®ÿsÀ8W§1n4…-°]È€úÒßŸê®8xà,g<#L\"X%@Š¤m+jø(ók\\sıZH³ GDJr®:t%QĞÃ¡ÇD0”¶tA‰E/´å`}hH±šå3\0U6©Ñ»À2\0/\0…Pß@e€(#'Y€.¯\0¼İ3“q½#Ù²(\n0®â¶#<¬‹ğ#›¢\0i)•®`›˜)ç`P!ÍH*&@Ø§B–J7D\0ßäÍœ	£~\0`aÀ±xoÁNT~8p&`S\"6Ü'&ÁTàkÀ¯È²QÉ±Æø°.¨ñÀ“ó3“xğ@`gÀıW.ŒøğDşÁƒhHìøpHàG97¨÷6ÌÃu°8`•ÁNÇ®	œø&ê¹àqÁH!÷6	#}ìpTàGÁWïÚæX(M^àšÁ%\\Ë†\\x-ğ?à±Áf¹–LØ!«™\0005Á[N¹–Ìx\"«™`Á—‚:¹–	Lø/*™àÇÁNÄ†\rbÉU°Z`KÁPëÎ\rìUæ°m\0_¨uƒÖÚ‡X1°O`Y¨uƒ+Nüu]prÔ:Á¥ƒÇ5C¬>0EStÁ;ƒO>ì¸-°€à¥ÁÚY*©–<xê™`áÂ	N©<µL°t`âÂ`˜ßŒE°ˆ`ôÂ~©–|#˜j™`ûÂG„#Æš·8J°‡aÂ;‚£ıql\"¸Cğ’SÚÂU„o	¡dªbx+0á;Â[÷	Ş,'µåprÖÂö°öü@ëaBÂN°ö<%Øk`ìÂŸ…SÖ\\#ØUË%VÂE„ç\nfœ+X?ğ~`§é„¯ş|)X!°³áNÂË‚K>,)M°´Ó±Âq…O\ní;Ø[ğ#ágÂ¿…ã\r@+Cu°ÁáGÂ—PS^ª‚˜[°“áa¨ó†\n¶Ì*#ğÁá{ÃPSşÚ¶¸a°CUµÃ‚:­®Ì,mp¹aK«k†Gm[\\.øf°­á’À³V×Îl,XGÖçádÃS‚ƒ.\\3ø\$°Úá¢Ã†×\r.Ü.˜W\0/áµÃW†Ê˜–šr°Áa´§Eƒgp,3˜\"ÓaÓÁn›\rŞ<¸k°4aDÂ>n›\rFtØqğC¦Ã,?A•xßŒ%¬¯0í´\reÓ‡{Ì|pôÓÄÀ­‡Ë8|>X_ğùa&ÃĞË{	Nl=˜Z0úb\0¦½‡ßN@¸{ÆéâÄ\r‡‡Ö œ.ø€ğüâÃùˆ'ö!@a1aéÃ¥ˆ;}4üD\0ßiÑa¾ÃÙ†?î!¼B‰ñ	âÄ+ˆ{¾!¼`À4Ó^©ó_¿v\"JillñS^¦#NÎ îÃ}ˆÌ¿VqÄˆ\"&¢&\$qµû1%\0s¦µ…K\"¼=4Ôñ&ÓõÄª(“¾!œ=‚‡±*ÔzÄ»‡¯M1¬K¸”10âRÄN¯î\"üLøŒp÷Ô-Ä«MÓ~&@@ñ7âdÄç‰›}DÌMøš±<âlÄIP­5œP8B°öSTÅˆ›MDÜP81SÅ‰ón'ìH´ìñ*ÓÅ+ŠM2R¸¢1\0SqÅ+Š3-5ŒR¸¤1Pâ’Ä‘Sç­?LU8¦1\0S§ÅSŠs}VLU8¨1\$S*ÅSŠ“®*lIkuñ*­ÏÅ{Š³}4ìW¸¬1T4Å{ŠÓ]SüW¸®1dâºÄPiº,Z8O1ƒ}¯‹O!—áØ™t×WÅ§ˆµ–ğˆlY”ÃéÆbÓÄ´Ê¾­ÎZ¸¶±`ºeyVç–-ÜAX»±tb\rÄS‹ËE0úvX´päâ÷Å­LCæ.|\\8‡1uˆ‰®[‹G/ì[U%±„bÜÅ¬\n¯F.[£bq„bÎ¦½Œî\$<aXÁªPâÑ{7Œ{Î1ÌaØ¶©ËcÅÆ!÷²°¼Z8—1ˆµ§‹µJ|exÈq—UÆW‹æ©†2¼dôÏ1•ãÅ­‰Ãm0ú„Ø´i“cDÆi0jyøÑ1‰c?Âö\0Œ˜vœ:UÇ1\rbİ¦aˆóˆtjté1wãW\rÍB%l:Uæ1®ãÅ–.¬^˜¸j#âÑÅ\r¢œ¦6ìi8Ë©ıãnÆ›‹iş6ìbØ¥1´b–ÆûŒÃÖ)¬o¸Ñé‰cs¦-Œã7ÜdôÅñhâ¨ÆÑŠ»~8LVXãñœb¶ÇŒŸö6Šp´qacšÇ	‹Ö3ŒYXæ±‹bĞÆ‚rohİl^ ßFëcG­n¶/‘ºØİÄDÖÅÆ7[pİlgÆ_°écjÄsón;üv¸ñÓâóÇ„\"×–;\n«Xêq}ãÅÇoŒ.;¼v¸Á1µ²é¦Ÿ:¼w˜Ã1Óâ(Æ#†=Üv˜ø1ÛÓ„ÇSˆí–¯X\nì5}1!}ÀíÅ	—ªg7Ñ·»•÷..Üj¸q-²œ{@œj·–¹Cx2ô2×­odZ[ã¸¡ d6@¦½ö[ö8p¸Õ%&ãÜ„7[mg®P·l\0—wg ëµ‹åùZÍ¹¹k*öì‡Ap÷ îA\\¡¡ï½\nÈw1—'\$uİ½ÈipÒå\r‰VğÒh`\\£¹C#Å³µÊK_yî,Ü§¾½r¥¯L–©\n®je**n—k×R¦Ë]ˆKîEÉx²¡&Ä½™ü‹¾m\$ºnnq`ÔıÓKÅym!)ìo7ifàõ¯;h·[Şn_\$µ?ÕÖõ¹Y®Ü”òª†´]\"Î?¶ôÿmOÜ?o@à— ©ü€ú-\$’À´lÚÎÕaŒ‚\$°2	ä\rkÕ‘©ÁsY;gò\n5éÈ-j Å¤œƒwu2HdÈA’v?u¸Ç\rª€2;ÚV\0¡‘ÔıŞ,„y'^ä&µ“fªÖmÂûXrHd/nÊòîIö¹¤OÚÓ·…’£%Ğ›z×ÒdQä>É!‘ù–L|ˆy1íïH®bDå¥P\r¯ìˆî'r\$ØÃS‰gÒÆîDÛKöœÜfÛÎ¶Á‘zCMûÅW„íØcóÉËmI·¹—·6Òõ»ˆ·+#/#£…k°¹;\0)ãúo=mÊÜ¥¶¹×ègd·¼ß\$@k{îo²C¹à·aC\$HÖÓÙ5råÈ%3([\rÌ’ù@òLÛ°É6ÃnÜŞJÁù@òUÅ·7’¶İ”Œë4–4­8å·ënÎÎ¢¼–ùíÜä½·{“	Su½{vöd{7kÈƒ”Ï&\\Ÿö÷rgä£É£nÂåE¾,‘ô5¬%¸E²¾Öu\nÀˆı•í£Y’{•*Î\rÊ+ArAÜÆØ|½)”©ÊcËFĞ—¯]RäUy¢2(Û¶ë¿Vh,Ü_=ÊSgÎRY\$ªylèÈtèäì›”æÜNU-úÇòoÉg.Õ{æ¢•lû=†‡\"*ÑcSÜI¥…€4e14‘+}ÿGæ¯A‘5?=zôÃĞI8Yd¤âJÆ|Şôü'¤‚×åEË=Xt“…dÄŠùÃ´‡pß2.É’šöQâb(¦Oata/ŒdG=%5¢ûîÜµ°d'®‹6}a–“-ƒHX/m%5ÿ¹(œ¸%AœeÀz/–ñuş Š\0„òŞ:ã—4\0\\œ¸ä^ÄË€ùË.°¬·’Ã%‚füVLT”à<ó¥J_x˜²éö¨\"Ê<ìd\nn}«'Ÿ.#óJQ@êƒsåïPkÌáØ°‡C ¿\r)€˜È˜?¢n€1€]x¾ù¡”èTALù‚3\0>i˜\"o¸Asì‡\n1Ë†…d0¬ß7!òó¹Ì&À+EpÅLNÃAÏ²·–¼>Zµ×¹ôäÃÉŠ~3–´š€ÒÇS`a¤å­z`Éî¼\"¹=awówË—ÕBBú¹œì_š'ÙE>)T4ÆÒÕrŒ!(ù\r›\$6DÖC«à{3)(Ì>ğ[-˜™¬‰× äÊ…\0Ø6ˆµ£± ’CÉUËºF†q:i¬Œæ²=Gy øŠkXDß¢\n\nòB¸1ñšïÑ\nJ£¶Ğ8x\\Ì6^ Ag¯£40:¶`ÖEæ%M¥d‰?,»Õ8,ó	_U¾ÃÍ'š9[+íğ¶0~fÂ,'cš]÷Öf¬Ó€D^‘æ •ƒ˜ ïğÇ?2a39ãxĞÕÄÙìÌE€º?ˆ”¦]Îh<×\$*~ HÀ4R¬¨Ÿˆ?å1Ë£ù›\rõqÜ(ƒK³d\"ÚÍSJmıÆl4+¹´ÛA’Ì6ö¸fmiDÑàª©Ë¹ü’Ğ„âlØ0EÚ<FˆÑ›7#8À4ëÂÁæè\$Î1F[iÉ6EÃ•fá˜&X—7Q`1˜3wR<Ì%›¸ÙÏÈF¹Àz¾/„)&(xp.L3‚g\n\rœ2€u<àAã€7ç8ŠéVXÜâçFeİÎ'œ`¹vqğD[ÉÉê+µóäP™^I}½1•Å+şW³EœæË³‰ Õ˜ ¾p#u¹Î¢÷fLÎq–°=DQYÏL‡çÎq™²†fèLyŸåæ„Á3LïğÌ½™Óç )¾{™åÆ]`kt„aÅ.:„Àw3ğ!á’‰7%šå¦Jy6”[p½ç™ÙŞŸge‚´úÜìĞJ©2½‚Îá\0k;vw`;pJâ»);ˆd&w¬'\nÂ›D•~iÓ<\$÷>ğr3¶g‰}‚\r¨#¾W,î€Á!çyÎ¾ü“;³òGİÙ€%‚ÊŞ{¦1D\rG°@s¢“AÀeMhô\$&ô‹öÎÅçª‡ÄHV‰É\\õÓË3–¬Œ²QÕ\\µ­&¥ÈƒIÏwìDìœ÷\rWÂ&5?Ïq—=vtá>2¡dágZ”¿*ù4¢£ÿ/ÍĞs–~hT_>¤ÏÜúT³J+Ì)VQjs|ü“3X´óÍpm÷Öv²¢ğd„ıJ\"Ï¶\$ß>ì¢ğı¹ú¥¼dÌšù\$\\A¦TÖ-óôgÊ*/Ÿ< ¬ûy­ŸàÊª\n¶ÇöPäùQÂ“åE\0Ï•(¨Ô{BÌrÖ½ùÎ5#,VjsŸ’ZE*¾Ì\"só0ş]¡J¹w3\0?2Ë~fuøµƒWoüÏ‚ÛApDÀbäoúè23@1ØˆÃM´¤İ|oAˆ0¨zL2gf;Kù¦„sÊÚaşhAš	;Bº±vQ‚	S–ÀsBQí0‘ƒñRĞÀÂ%ı\$ïÂ:³ı!¹Òá *Sf§ ha	„Š—óDP0‰ü3ÊWõÕªpã©Å\0Îüy4\0¾Pà)0ãúßÉ2y\0ü\0<xf8\0a¹¦ \nåt¸0y+§AE¯µÑ\"?ü87¤z%Eh—’¾!ˆÀA:\$\niX\0ª‚à>‰slÜ£Ò-¨?¢‰ŸV‰â‚øú£ChnÏ¡Â>@7ÿãğ‚,ª¨xæÓ*i</¡¥QŠU%Õó{@ #ïÿŞ¶‚ÇTù¢†kÒÎÒ²RoV»&\rç³öÇÁÒót/\"ğ\0v");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôa8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wş\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹”ªÓ²Ş»\0\0;";break;}}exit;}function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
idf_unescape($t){$Id=substr($t,-1);return
str_replace($Id.$Id,$Id,substr($t,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
remove_slashes($yf,$Gc=false){if(get_magic_quotes_gpc()){while(list($x,$X)=each($yf)){foreach($X
as$_d=>$W){unset($yf[$x][$_d]);if(is_array($W)){$yf[$x][stripslashes($_d)]=$W;$yf[]=&$yf[$x][stripslashes($_d)];}else$yf[$x][stripslashes($_d)]=($Gc?$W:stripslashes($W));}}}}function
bracket_escape($t,$La=false){static$hh=array(':'=>':1',']'=>':2','['=>':3');return
strtr($t,($La?array_flip($hh):$hh));}function
h($P){return
htmlspecialchars(str_replace("\0","",$P),ENT_QUOTES);}function
nbsp($P){return(trim($P)!=""?h($P):"&nbsp;");}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($C,$Y,$Za,$Gd="",$Fe="",$db=""){$J="<input type='checkbox' name='$C' value='".h($Y)."'".($Za?" checked":"").($Fe?' onclick="'.h($Fe).'"':'').">";return($Gd!=""||$db?"<label".($db?" class='$db'":"").">$J".h($Gd)."</label>":$J);}function
optionlist($Ke,$ig=null,$Ch=false){$J="";foreach($Ke
as$_d=>$W){$Le=array($_d=>$W);if(is_array($W)){$J.='<optgroup label="'.h($_d).'">';$Le=$W;}foreach($Le
as$x=>$X)$J.='<option'.($Ch||is_string($x)?' value="'.h($x).'"':'').(($Ch||is_string($x)?(string)$x:$X)===$ig?' selected':'').'>'.h($X);if(is_array($W))$J.='</optgroup>';}return$J;}function
html_select($C,$Ke,$Y="",$Ee=true){if($Ee)return"<select name='".h($C)."'".(is_string($Ee)?' onchange="'.h($Ee).'"':"").">".optionlist($Ke,$Y)."</select>";$J="";foreach($Ke
as$x=>$X)$J.="<label><input type='radio' name='".h($C)."' value='".h($x)."'".($x==$Y?" checked":"").">".h($X)."</label>";return$J;}function
select_input($Ha,$Ke,$Y="",$kf=""){return($Ke?"<select$Ha><option value=''>$kf".optionlist($Ke,$Y,true)."</select>":"<input$Ha value='".h($Y)."' placeholder='$kf'>");}function
confirm(){return" onclick=\"return confirm('".'Are you sure?'."');\"";}function
print_fieldset($s,$Nd,$Nh=false,$Fe=""){echo"<fieldset><legend><a href='#fieldset-$s' onclick=\"".h($Fe)."return !toggle('fieldset-$s');\">$Nd</a></legend><div id='fieldset-$s'".($Nh?"":" class='hidden'").">\n";}function
bold($Ta,$db=""){return($Ta?" class='active $db'":($db?" class='$db'":""));}function
odd($J=' class="odd"'){static$r=0;if(!$J)$r=-1;return($r++%2?$J:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($x,$X=null){static$Hc=true;if($Hc)echo"{";if($x!=""){echo($Hc?"":",")."\n\t\"".addcslashes($x,"\r\n\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'undefined');$Hc=false;}else{echo"\n}\n";$Hc=true;}}function
ini_bool($pd){$X=ini_get($pd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$J;if($J===null)$J=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$J;}function
q($P){global$g;return$g->quote($P);}function
get_vals($H,$e=0){global$g;$J=array();$I=$g->query($H);if(is_object($I)){while($K=$I->fetch_row())$J[]=$K[$e];}return$J;}function
get_key_vals($H,$h=null,$Xg=0){global$g;if(!is_object($h))$h=$g;$J=array();$h->timeout=$Xg;$I=$h->query($H);$h->timeout=0;if(is_object($I)){while($K=$I->fetch_row())$J[$K[0]]=$K[1];}return$J;}function
get_rows($H,$h=null,$l="<p class='error'>"){global$g;$pb=(is_object($h)?$h:$g);$J=array();$I=$pb->query($H);if(is_object($I)){while($K=$I->fetch_assoc())$J[]=$K;}elseif(!$I&&!is_object($h)&&$l&&defined("PAGE_HEADER"))echo$l.error()."\n";return$J;}function
unique_array($K,$v){foreach($v
as$u){if(preg_match("~PRIMARY|UNIQUE~",$u["type"])){$J=array();foreach($u["columns"]as$x){if(!isset($K[$x]))continue
2;$J[$x]=$K[$x];}return$J;}}}function
where($Z,$n=array()){global$w;$J=array();$Rc='(^[\w\(]+('.str_replace("_",".*",preg_quote(idf_escape("_"))).')?\)+$)';foreach((array)$Z["where"]as$x=>$X){$x=bracket_escape($x,1);$e=(preg_match($Rc,$x)?$x:idf_escape($x));$J[]=$e.(($w=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X))||$w=="mssql"?" LIKE ".q(addcslashes($X,"%_\\")):" = ".unconvert_field($n[$x],q($X)));if($w=="sql"&&preg_match("~[^ -@]~",$X))$J[]="$e = ".q($X)." COLLATE utf8_bin";}foreach((array)$Z["null"]as$x)$J[]=(preg_match($Rc,$x)?$x:idf_escape($x))." IS NULL";return
implode(" AND ",$J);}function
where_check($X,$n=array()){parse_str($X,$Ya);remove_slashes(array(&$Ya));return
where($Ya,$n);}function
where_link($r,$e,$Y,$Ge="="){return"&where%5B$r%5D%5Bcol%5D=".urlencode($e)."&where%5B$r%5D%5Bop%5D=".urlencode(($Y!==null?$Ge:"IS NULL"))."&where%5B$r%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$n,$M=array()){$J="";foreach($f
as$x=>$X){if($M&&!in_array(idf_escape($x),$M))continue;$Ea=convert_field($n[$x]);if($Ea)$J.=", $Ea AS ".idf_escape($x);}return$J;}function
cookie($C,$Y,$Pd=2592000){global$ba;$F=array($C,(preg_match("~\n~",$Y)?"":$Y),($Pd?time()+$Pd:0),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$F[]=true;return
call_user_func_array('setcookie',$F);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($x){return$_SESSION[$x][DRIVER][SERVER][$_GET["username"]];}function
set_session($x,$X){$_SESSION[$x][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Jh,$N,$V,$k=null){global$Tb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($Tb))."|username|".($k!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Jh!="server"||$N!=""?urlencode($Jh)."=".urlencode($N)."&":"")."username=".urlencode($V).($k!=""?"&db=".urlencode($k):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($A,$ee=null){if($ee!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($A!==null?$A:$_SERVER["REQUEST_URI"]))][]=$ee;}if($A!==null){if($A=="")$A=".";header("Location: $A");exit;}}function
query_redirect($H,$A,$ee,$Hf=true,$tc=true,$Ac=false){global$g,$l,$b;$Wg="";if($tc){$wg=microtime(true);$Ac=!$g->query($H);$Wg="; -- ".format_time($wg,microtime(true));}$ug="";if($H)$ug=$b->messageQuery($H.$Wg);if($Ac){$l=error().$ug;return
false;}if($Hf)redirect($A,$ee.$ug);return
true;}function
queries($H=null){global$g;static$Bf=array();if($H===null)return
implode("\n",$Bf);$wg=microtime(true);$J=$g->query($H);$Bf[]=(preg_match('~;$~',$H)?"DELIMITER ;;\n$H;\nDELIMITER ":$H)."; -- ".format_time($wg,microtime(true));return$J;}function
apply_queries($H,$S,$oc='table'){foreach($S
as$Q){if(!queries("$H ".$oc($Q)))return
false;}return
true;}function
queries_redirect($A,$ee,$Hf){return
query_redirect(queries(),$A,$ee,$Hf,false,!$Hf);}function
format_time($wg,$ic){return
sprintf('%.3f s',max(0,$ic-$wg));}function
remove_from_uri($Xe=""){return
substr(preg_replace("~(?<=[?&])($Xe".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($E,$_b){return" ".($E==$_b?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($x,$Gb=false){$Ec=$_FILES[$x];if(!$Ec)return
null;foreach($Ec
as$x=>$X)$Ec[$x]=(array)$X;$J='';foreach($Ec["error"]as$x=>$l){if($l)return$l;$C=$Ec["name"][$x];$eh=$Ec["tmp_name"][$x];$rb=file_get_contents($Gb&&preg_match('~\\.gz$~',$C)?"compress.zlib://$eh":$eh);if($Gb){$wg=substr($rb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$wg,$Nf))$rb=iconv("utf-16","utf-8",$rb);elseif($wg=="\xEF\xBB\xBF")$rb=substr($rb,3);$J.=$rb."\n\n";}}return$J;}function
upload_error($l){$be=($l==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($l?'Unable to upload a file.'.($be?" ".sprintf('Maximum allowed file size is %sB.',$be):""):'File does not exist.');}function
repeat_pattern($hf,$y){return
str_repeat("$hf{0,65535}",$y/65535)."$hf{0,".($y%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($P,$y=80,$Cg=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$y).")($)?)u",$P,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$y).")($)?)",$P,$B);return
h($B[1]).$Cg.(isset($B[2])?"":"<i>...</i>");}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($yf,$id=array()){while(list($x,$X)=each($yf)){if(is_array($X)){foreach($X
as$_d=>$W)$yf[$x."[$_d]"]=$W;}elseif(!in_array($x,$id))echo'<input type="hidden" name="'.h($x).'" value="'.h($X).'">';}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$Bc=false){$J=table_status($Q,$Bc);return($J?$J:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$J=array();foreach($b->foreignKeys($Q)as$o){foreach($o["source"]as$X)$J[$X][]=$o;}return$J;}function
enum_input($U,$Ha,$m,$Y,$hc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$m["length"],$Wd);$J=($hc!==null?"<label><input type='$U'$Ha value='$hc'".((is_array($Y)?in_array($hc,$Y):$Y===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Wd[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Za=(is_int($Y)?$Y==$r+1:(is_array($Y)?in_array($r+1,$Y):$Y===$X));$J.=" <label><input type='$U'$Ha value='".($r+1)."'".($Za?' checked':'').'>'.h($b->editVal($X,$m)).'</label>';}return$J;}function
input($m,$Y,$p){global$g,$rh,$b,$w;$C=h(bracket_escape($m["field"]));echo"<td class='function'>";if(is_array($Y)&&!$p){$Ca=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Ca[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Ca);$p="json";}$Qf=($w=="mssql"&&$m["auto_increment"]);if($Qf&&!$_POST["save"])$p=null;$Sc=(isset($_GET["select"])||$Qf?array("orig"=>'original'):array())+$b->editFunctions($m);$Ha=" name='fields[$C]'";if($m["type"]=="enum")echo
nbsp($Sc[""])."<td>".$b->editInput($_GET["edit"],$m,$Ha,$Y);else{$Hc=0;foreach($Sc
as$x=>$X){if($x===""||!$X)break;$Hc++;}$Ee=($Hc?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($m["field"])))."]']; if ($Hc > f.selectedIndex) f.selectedIndex = $Hc;\" onkeyup='keyupChange.call(this);'":"");$Ha.=$Ee;echo(count($Sc)>1?"<select name='function[$C]' onchange='functionChange(this);'".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).">".optionlist($Sc,$p===null||in_array($p,$Sc)||isset($Sc[$p])?$p:"")."</select>":nbsp(reset($Sc))).'<td>';$rd=$b->editInput($_GET["edit"],$m,$Ha,$Y);if($rd!="")echo$rd;elseif($m["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$m["length"],$Wd);foreach($Wd[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Za=(is_int($Y)?($Y>>$r)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$r]' value='".(1<<$r)."'".($Za?' checked':'')."$Ee>".h($b->editVal($X,$m)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$m["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$C'$Ee>";elseif(($Ug=preg_match('~text|lob~',$m["type"]))||preg_match("~\n~",$Y)){if($Ug&&$w!="sqlite")$Ha.=" cols='50' rows='12'";else{$L=min(12,substr_count($Y,"\n")+1);$Ha.=" cols='30' rows='$L'".($L==1?" style='height: 1.2em;'":"");}echo"<textarea$Ha>".h($Y).'</textarea>';}elseif($p=="json")echo"<textarea$Ha cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$de=(!preg_match('~int~',$m["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$m["length"],$B)?((preg_match("~binary~",$m["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$m["unsigned"]?1:0)):($rh[$m["type"]]?$rh[$m["type"]]+($m["unsigned"]?0:1):0));if($w=='sql'&&$g->server_info>=5.6&&preg_match('~time~',$m["type"]))$de+=7;echo"<input".(preg_match('~int~',$m["type"])?" type='number'":"")." value='".h($Y)."'".($de?" maxlength='$de'":"").(preg_match('~char|binary~',$m["type"])&&$de>20?" size='40'":"")."$Ha>";}}}function
process_input($m){global$b;$t=bracket_escape($m["field"]);$p=$_POST["function"][$t];$Y=$_POST["fields"][$t];if($m["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($m["auto_increment"]&&$Y=="")return
null;if($p=="orig")return($m["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($m["field"]):false);if($p=="NULL")return"NULL";if($m["type"]=="set")return
array_sum((array)$Y);if($p=="json"){$p="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$m["type"])&&ini_bool("file_uploads")){$Ec=get_file("fields-$t");if(!is_string($Ec))return
false;return
q($Ec);}return$b->processInput($m,$Y,$p);}function
search_tables(){global$b,$g;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$Nc=false;foreach(table_status('',true)as$Q=>$R){$C=$b->tableName($R);if(isset($R["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$I=$g->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$I||$I->fetch_row()){if(!$Nc){echo"<ul>\n";$Nc=true;}echo"<li>".($I?"<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>\n":"$C: <span class='error'>".error()."</span>\n");}}}echo($Nc?"</ul>":"<p class='message'>".'No tables.')."\n";}function
dump_headers($gd,$ne=false){global$b;$J=$b->dumpHeaders($gd,$ne);$Ve=$_POST["output"];if($Ve!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($gd).".$J".($Ve!="file"&&!preg_match('~[^0-9a-z]~',$Ve)?".$Ve":""));session_write_close();ob_flush();flush();return$J;}function
dump_csv($K){foreach($K
as$x=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$K[$x]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$K)."\r\n";}function
apply_sql_function($p,$e){return($p?($p=="unixepoch"?"DATETIME($e, '$p')":($p=="count distinct"?"COUNT(DISTINCT ":strtoupper("$p("))."$e)"):$e);}function
password_file($xb){$Ob=ini_get("upload_tmp_dir");if(!$Ob){if(function_exists('sys_get_temp_dir'))$Ob=sys_get_temp_dir();else{$Fc=@tempnam("","");if(!$Fc)return
false;$Ob=dirname($Fc);unlink($Fc);}}$Fc="$Ob/adminer.key";$J=@file_get_contents($Fc);if($J||!$xb)return$J;$Pc=@fopen($Fc,"w");if($Pc){$J=rand_string();fwrite($Pc,$J);fclose($Pc);}return$J;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$m,$Vg){global$b,$ba;if(is_array($X)){$J="";foreach($X
as$_d=>$W)$J.="<tr>".($X!=array_values($X)?"<th>".h($_d):"")."<td>".select_value($W,$_,$m,$Vg);return"<table cellspacing='0'>$J</table>";}if(!$_)$_=$b->selectLink($X,$m);if($_===null){if(is_mail($X))$_="mailto:$X";if($_f=is_url($X))$_=($_f=="http"&&$ba?$X:"$_f://www.adminer.org/redirect/?url=".urlencode($X));}$X=$b->editVal($X,$m);if($X!==null){if($X==="")$X="&nbsp;";elseif($Vg!=""&&is_shortable($m))$X=shorten_utf8($X,max(0,+$Vg));else$X=h($X);}$X=$b->selectVal($X,$_,$m);return$X;}function
is_mail($ec){$Fa='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Rb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$hf="$Fa+(\\.$Fa+)*@($Rb?\\.)+$Rb";return
is_string($ec)&&preg_match("(^$hf(,\\s*$hf)*\$)i",$ec);}function
is_url($P){$Rb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($Rb?\\.)+$Rb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P,$B)?strtolower($B[1]):"");}function
is_shortable($m){return
preg_match('~char|text|lob|geometry|point|linestring|polygon|string~',$m["type"]);}function
count_rows($Q,$Z,$ud,$q){global$w;$H=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($ud&&($w=="sql"||count($q)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$q).")$H":"SELECT COUNT(*)".($ud?" FROM (SELECT 1$H$Vc) x":$H));}function
slow_query($H){global$b,$T;$k=$b->database();$Xg=$b->queryTimeout();if(support("kill")&&is_object($h=connect())&&($k==""||$h->select_db($k))){$Ed=$h->result("SELECT CONNECTION_ID()");echo'<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'token=',$T,'&kill=',$Ed,'\');
}, ',1000*$Xg,');
</script>
';}else$h=null;ob_flush();flush();$J=@get_key_vals($H,$h,$Xg);if($h){echo"<script type='text/javascript'>clearTimeout(timeout);</script>\n";ob_flush();flush();}return
array_keys($J);}function
get_token(){$Ef=rand(1,1e6);return($Ef^$_SESSION["token"]).":$Ef";}function
verify_token(){list($T,$Ef)=explode(":",$_POST["token"]);return($Ef^$_SESSION["token"])==$T;}function
lzw_decompress($Pa){$Nb=256;$Qa=8;$fb=array();$Sf=0;$Tf=0;for($r=0;$r<strlen($Pa);$r++){$Sf=($Sf<<8)+ord($Pa[$r]);$Tf+=8;if($Tf>=$Qa){$Tf-=$Qa;$fb[]=$Sf>>$Tf;$Sf&=(1<<$Tf)-1;$Nb++;if($Nb>>$Qa)$Qa++;}}$Mb=range("\0","\xFF");$J="";foreach($fb
as$r=>$eb){$dc=$Mb[$eb];if(!isset($dc))$dc=$Rh.$Rh[0];$J.=$dc;if($r)$Mb[]=$Rh.$dc[0];$Rh=$dc;}return$J;}function
on_help($kb,$pg=0){return" onmouseover='helpMouseover(this, event, ".h($kb).", $pg);' onmouseout='helpMouseout(this, event);'";}global$b,$g,$Tb,$bc,$lc,$l,$Sc,$Wc,$ba,$qd,$w,$ca,$Hd,$De,$if,$_g,$Zc,$T,$jh,$rh,$yh,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$ba=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);session_cache_limiter("");if(!defined("SID")){session_name("adminer_sid");$F=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$F[]=true;call_user_func_array('session_set_cookie_params',$F);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Gc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);function
get_lang(){return'en';}function
lang($ih,$we=null){if(is_array($ih)){$mf=($we==1?0:1);$ih=$ih[$mf];}$ih=str_replace("%d","%s",$ih);$we=number_format($we,0,".",',');return
sprintf($ih,$we);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$mf=array_search("SQL",$b->operators);if($mf!==false)unset($b->operators[$mf]);}function
dsn($Yb,$V,$G){try{parent::__construct($Yb,$V,$G);}catch(Exception$qc){auth_error($qc);exit;}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($H,$sh=false){$I=parent::query($H);$this->error="";if(!$I){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($I);return$I;}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result($I=null){if(!$I){$I=$this->_result;if(!$I)return
false;}if($I->columnCount()){$I->num_rows=$I->rowCount();return$I;}$this->affected_rows=$I->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($H,$m=0){$I=$this->query($H);if(!$I)return
false;$K=$I->fetch();return$K[$m];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$K=(object)$this->getColumnMeta($this->_offset++);$K->orgtable=$K->table;$K->orgname=$K->name;$K->charsetnr=(in_array("blob",(array)$K->flags)?63:0);return$K;}}}$Tb=array();class
Min_SQL{var$_conn;function
Min_SQL($g){$this->_conn=$g;}function
select($Q,$M,$Z,$q,$Me,$z,$E){global$b,$w;$ud=(count($q)<count($M));$H=$b->selectQueryBuild($M,$Z,$q,$Me,$z,$E);if(!$H)$H="SELECT".limit(($_GET["page"]!="last"&&+$z&&$q&&$ud&&$w=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$M)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($q&&$ud?"\nGROUP BY ".implode(", ",$q):"").($Me?"\nORDER BY ".implode(", ",$Me):""),($z!=""?+$z:null),($E?$z*$E:0),"\n");echo$b->selectQuery($H);return$this->_conn->query($H);}function
delete($Q,$Cf,$z=0){$H="FROM ".table($Q);return
queries("DELETE".($z?limit1($H,$Cf):" $H$Cf"));}function
update($Q,$O,$Cf,$z=0,$kg="\n"){$Hh=array();foreach($O
as$x=>$X)$Hh[]="$x = $X";$H=table($Q)." SET$kg".implode(",$kg",$Hh);return
queries("UPDATE".($z?limit1($H,$Cf):" $H$Cf"));}function
insert($Q,$O){return
queries("INSERT INTO ".table($Q).($O?" (".implode(", ",array_keys($O)).")\nVALUES (".implode(", ",$O).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$L,$sf){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}}$Tb["sqlite"]="SQLite 3";$Tb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$pf=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
Min_SQLite($Fc){$this->_link=new
SQLite3($Fc);$Kh=$this->_link->version();$this->server_info=$Kh["versionString"];}function
query($H){$I=@$this->_link->query($H);$this->error="";if(!$I){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($I->numColumns())return
new
Min_Result($I);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($H,$m=0){$I=$this->query($H);if(!is_object($I))return
false;$K=$I->_result->fetchArray();return$K[$m];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($I){$this->_result=$I;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
Min_SQLite($Fc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Fc);}function
query($H,$sh=false){$ke=($sh?"unbufferedQuery":"query");$I=@$this->_link->$ke($H,SQLITE_BOTH,$l);$this->error="";if(!$I){$this->error=$l;return
false;}elseif($I===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($I);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($H,$m=0){$I=$this->query($H);if(!is_object($I))return
false;$K=$I->_result->fetch();return$K[$m];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($I){$this->_result=$I;if(method_exists($I,'numRows'))$this->num_rows=$I->numRows();}function
fetch_assoc(){$K=$this->_result->fetch(SQLITE_ASSOC);if(!$K)return
false;$J=array();foreach($K
as$x=>$X)$J[($x[0]=='"'?idf_unescape($x):$x)]=$X;return$J;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$C=$this->_result->fieldName($this->_offset++);$hf='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($hf\\.)?$hf\$~",$C,$B)){$Q=($B[3]!=""?$B[3]:idf_unescape($B[2]));$C=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$C,"orgname"=>$C,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
Min_SQLite($Fc){$this->dsn(DRIVER.":$Fc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
Min_DB(){$this->Min_SQLite(":memory:");}function
select_db($Fc){if(is_readable($Fc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Fc)?$Fc:dirname($_SERVER["SCRIPT_FILENAME"])."/$Fc")." AS a")){$this->Min_SQLite($Fc);return
true;}return
false;}function
multi_query($H){return$this->_result=$this->query($H);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$L,$sf){$Hh=array();foreach($L
as$O)$Hh[]="(".implode(", ",$O).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($L))).") VALUES\n".implode(",\n",$Hh));}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($H,$Z,$z,$D=0,$kg=" "){return" $H$Z".($z!==null?$kg."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($H,$Z){global$g;return($g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($H,$Z,1):" $H$Z");}function
db_collation($k,$ib){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($j){return
array();}function
table_status($C=""){global$g;$J=array();foreach(get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$K){$K["Oid"]=1;$K["Auto_increment"]="";$K["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($K["Name"]));$J[$K["Name"]]=$K;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$K)$J[$K["name"]]["Auto_increment"]=$K["seq"];return($C!=""?$J[$C]:$J);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$g;$J=array();$sf="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$K){$C=$K["name"];$U=strtolower($K["type"]);$Hb=$K["dflt_value"];$J[$C]=array("field"=>$C,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$Hb,$B)?str_replace("''","'",$B[1]):($Hb=="NULL"?null:$Hb)),"null"=>!$K["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$K["pk"],);if($K["pk"]){if($sf!="")$J[$sf]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$J[$C]["auto_increment"]=true;$sf=$C;}}$ug=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$ug,$Wd,PREG_SET_ORDER);foreach($Wd
as$B){$C=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($J[$C])$J[$C]["collation"]=trim($B[3],"'");}return$J;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$J=array();$ug=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*")++)~i',$ug,$B)){$J[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$Wd,PREG_SET_ORDER);foreach($Wd
as$B){$J[""]["columns"][]=idf_unescape($B[2]).$B[4];$J[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$J){foreach(fields($Q)as$C=>$m){if($m["primary"])$J[""]=array("type"=>"PRIMARY","columns"=>array($C),"lengths"=>array(),"descs"=>array(null));}}$vg=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$h);foreach(get_rows("PRAGMA index_list(".table($Q).")",$h)as$K){$C=$K["name"];if(!preg_match("~^sqlite_~",$C)){$J[$C]["type"]=($K["unique"]?"UNIQUE":"INDEX");$J[$C]["lengths"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($C).")",$h)as$ag)$J[$C]["columns"][]=$ag["name"];$J[$C]["descs"]=array();if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($C).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$vg[$C],$Nf)){preg_match_all('/("[^"]*+")+( DESC)?/',$Nf[2],$Wd);foreach($Wd[2]as$X)$J[$C]["descs"][]=($X?'1':null);}}}return$J;}function
foreign_keys($Q){$J=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$K){$o=&$J[$K["id"]];if(!$o)$o=$K;$o["source"][]=$K["from"];$o["target"][]=$K["to"];}return$J;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($C))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($k){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($C){global$g;$_c="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($_c)\$~",$C)){$g->error=sprintf('Please use one of the extensions %s.',str_replace("|",", ",$_c));return
false;}return
true;}function
create_database($k,$d){global$g;if(file_exists($k)){$g->error='File exists.';return
false;}if(!check_sqlite_name($k))return
false;try{$_=new
Min_SQLite($k);}catch(Exception$qc){$g->error=$qc->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($j){global$g;$g->Min_SQLite(":memory:");foreach($j
as$k){if(!@unlink($k)){$g->error='File exists.';return
false;}}return
true;}function
rename_database($C,$d){global$g;if(!check_sqlite_name($C))return
false;$g->Min_SQLite(":memory:");$g->error='File exists.';return@rename(DB,$C);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$C,$n,$Jc,$mb,$jc,$d,$Ja,$cf){$Bh=($Q==""||$Jc);foreach($n
as$m){if($m[0]!=""||!$m[1]||$m[2]){$Bh=true;break;}}$c=array();$Te=array();foreach($n
as$m){if($m[1]){$c[]=($Bh?$m[1]:"ADD ".implode($m[1]));if($m[0]!="")$Te[$m[0]]=$m[1][0];}}if(!$Bh){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$C&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($C)))return
false;}elseif(!recreate_table($Q,$C,$c,$Te,$Jc))return
false;if($Ja)queries("UPDATE sqlite_sequence SET seq = $Ja WHERE name = ".q($C));return
true;}function
recreate_table($Q,$C,$n,$Te,$Jc,$v=array()){queries("BEGIN");if($Q!=""){if(!$n){foreach(fields($Q)as$x=>$m){$n[]=process_field($m,$m);$Te[$x]=idf_escape($x);}}$tf=false;foreach($n
as$x=>$m){if($m[6])$tf=true;$n[$x]="  ".implode($m);}$Wb=array();foreach($v
as$x=>$X){if($X[2]=="DROP"){$Wb[$X[1]]=true;unset($v[$x]);}}foreach(indexes($Q)as$Cd=>$u){$f=array();foreach($u["columns"]as$x=>$e){if(!$Te[$e])continue
2;$f[]=$Te[$e].($u["descs"][$x]?" DESC":"");}$f="(".implode(", ",$f).")";if(!$Wb[$Cd]){if($u["type"]!="PRIMARY"||!$tf)$v[]=array($u["type"],$Cd,$f);}}foreach($v
as$x=>$X){if($X[0]=="PRIMARY"){unset($v[$x]);$Jc[]="  PRIMARY KEY $X[2]";}}foreach(foreign_keys($Q)as$Cd=>$o){foreach($o["source"]as$x=>$e){if(!$Te[$e])continue
2;$o["source"][$x]=idf_unescape($Te[$e]);}if(!isset($Jc[" $Cd"]))$Jc[]=" ".format_foreign_key($o);}}$n=array_merge($n,array_filter($Jc));if(!queries("CREATE TABLE ".table($Q!=""?"adminer_$C":$C)." (\n".implode(",\n",$n)."\n)"))return
false;if($Q!=""){if($Te&&!queries("INSERT INTO ".table("adminer_$C")." (".implode(", ",$Te).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Te)))." FROM ".table($Q)))return
false;$oh=array();foreach(triggers($Q)as$mh=>$Yg){$kh=trigger($mh);$oh[]="CREATE TRIGGER ".idf_escape($mh)." ".implode(" ",$Yg)." ON ".table($C)."\n$kh[Statement]";}if(!queries("DROP TABLE ".table($Q)))return
false;queries("ALTER TABLE ".table("adminer_$C")." RENAME TO ".table($C));if(!alter_indexes($C,$v))return
false;foreach($oh
as$kh){if(!queries($kh))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$U,$C,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($C!=""?$C:uniqid($Q."_"))." ON ".table($Q)." $f";}function
alter_indexes($Q,$c){foreach($c
as$sf){if($sf[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],$X[2])))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($Mh){return
apply_queries("DROP VIEW",$Mh);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$Mh,$Pg){return
false;}function
trigger($C){global$g;if($C=="")return
array("Statement"=>"BEGIN\n\t;\nEND");preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*(BEFORE|AFTER|INSTEAD\\s+OF)\\s+([a-z]+)\\s+ON\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*(?:FOR\\s*EACH\\s*ROW\\s)?(.*)~is',$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($C)),$B);return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]),"Trigger"=>$C,"Statement"=>$B[3]);}function
triggers($Q){$J=array();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$K){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s*([a-z]+)~i',$K["sql"],$B);$J[$K["name"]]=array($B[1],$B[2]);}return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){}function
routines(){}function
routine_languages(){}function
begin(){return
queries("BEGIN");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$H){return$g->query("EXPLAIN $H");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($eg){return
true;}function
create_sql($Q,$Ja){global$g;$J=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$C=>$u){if($C=='')continue;$J.=";\n\n".index_sql($Q,$u['type'],$C,"(".implode(", ",array_map('idf_escape',$u['columns'])).")");}return$J;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($Cb){}function
trigger_sql($Q,$Ag){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$g;$J=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$x)$J[$x]=$g->result("PRAGMA $x");return$J;}function
show_status(){$J=array();foreach(get_vals("PRAGMA compile_options")as$Je){list($x,$X)=explode("=",$Je,2);$J[$x]=$X;}return$J;}function
convert_field($m){}function
unconvert_field($m,$J){return$J;}function
support($Cc){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Cc);}$w="sqlite";$rh=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$_g=array_keys($rh);$yh=array();$He=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Sc=array("hex","length","lower","round","unixepoch","upper");$Wc=array("avg","count","count distinct","group_concat","max","min","sum");$bc=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Tb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$pf=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($mc,$l){if(ini_bool("html_errors"))$l=html_entity_decode(strip_tags($l));$l=preg_replace('~^[^:]*: ~','',$l);$this->error=$l;}function
connect($N,$V,$G){global$b;$k=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($G,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($k!=""?addcslashes($k,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$k!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Kh=pg_version($this->_link);$this->server_info=$Kh["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
select_db($Cb){global$b;if($Cb==$b->database())return$this->_database;$J=@pg_connect("$this->_string dbname='".addcslashes($Cb,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($J)$this->_link=$J;return$J;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($H,$sh=false){$I=@pg_query($this->_link,$H);$this->error="";if(!$I){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($I)){$this->affected_rows=pg_affected_rows($I);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$m=0){$I=$this->query($H);if(!$I||!$I->num_rows)return
false;return
pg_fetch_result($I->_result,0,$m);}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($I){$this->_result=$I;$this->num_rows=pg_num_rows($I);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;if(function_exists('pg_field_table'))$J->orgtable=pg_field_table($this->_result,$e);$J->name=pg_field_name($this->_result,$e);$J->orgname=$J->name;$J->type=pg_field_type($this->_result,$e);$J->charsetnr=($J->type=="bytea"?63:0);return$J;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL";function
connect($N,$V,$G){global$b;$k=$b->database();$P="pgsql:host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$P dbname='".($k!=""?addcslashes($k,"'\\"):"postgres")."'",$V,$G);return
true;}function
select_db($Cb){global$b;return($b->database()==$Cb);}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$L,$sf){global$g;foreach($L
as$O){$zh=array();$Z=array();foreach($O
as$x=>$X){$zh[]="$x = $X";if(isset($sf[idf_unescape($x)]))$Z[]="$x = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$zh)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).")")))return
false;}return
true;}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2])){if($g->server_info>=9)$g->query("SET application_name = 'Adminer'");return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database ORDER BY datname");}function
limit($H,$Z,$z,$D=0,$kg=" "){return" $H$Z".($z!==null?$kg."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($H,$Z){return" $H$Z";}function
db_collation($k,$ib){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){return
get_key_vals("SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema() ORDER BY table_name");}function
count_tables($j){return
array();}function
table_status($C=""){$J=array();foreach(get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN 'table' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids::int AS \"Oid\", reltuples as \"Rows\"
FROM pg_class
WHERE relkind IN ('r','v')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
".($C!=""?"AND relname = ".q($C):"ORDER BY relname"))as$K)$J[$K["Name"]]=$K;return($C!=""?$J[$C]:$J);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$J=array();$Aa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$K){preg_match('~([^([]+)(\((.*)\))?((\[[0-9]*])*)$~',$K["full_type"],$B);list(,$U,$y,$K["length"],$Da)=$B;$K["length"].=$Da;$K["type"]=($Aa[$U]?$Aa[$U]:$U);$K["full_type"]=$K["type"].$y.$Da;$K["null"]=!$K["attnotnull"];$K["auto_increment"]=preg_match('~^nextval\\(~i',$K["default"]);$K["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$K["default"],$B))$K["default"]=($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2];$J[$K["field"]]=$K;}return$J;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$J=array();$Ig=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Ig AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption FROM pg_index i, pg_class ci WHERE i.indrelid = $Ig AND ci.oid = i.indexrelid",$h)as$K){$Of=$K["relname"];$J[$Of]["type"]=($K["indisprimary"]?"PRIMARY":($K["indisunique"]?"UNIQUE":"INDEX"));$J[$Of]["columns"]=array();foreach(explode(" ",$K["indkey"])as$md)$J[$Of]["columns"][]=$f[$md];$J[$Of]["descs"]=array();foreach(explode(" ",$K["indoption"])as$nd)$J[$Of]["descs"][]=($nd&1?'1':null);$J[$Of]["lengths"]=array();}return$J;}function
foreign_keys($Q){global$De;$J=array();foreach(get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$K){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$K['definition'],$B)){$K['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$Vd)){$K['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Vd[2]));$K['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Vd[4]));}$K['target']=array_map('trim',explode(',',$B[3]));$K['on_delete']=(preg_match("~ON DELETE ($De)~",$B[4],$Vd)?$Vd[1]:'NO ACTION');$K['on_update']=(preg_match("~ON UPDATE ($De)~",$B[4],$Vd)?$Vd[1]:'NO ACTION');$J[$K['conname']]=$K;}}return$J;}function
view($C){global$g;return
array("select"=>$g->result("SELECT pg_get_viewdef(".q($C).")"));}function
collations(){return
array();}function
information_schema($k){return($k=="information_schema");}function
error(){global$g;$J=h($g->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$J,$B))$J=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\\1<b>\\2</b>',$B[2]).$B[4];return
nl_br($J);}function
create_database($k,$d){return
queries("CREATE DATABASE ".idf_escape($k).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($j){global$g;$g->close();return
apply_queries("DROP DATABASE",$j,'idf_escape');}function
rename_database($C,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($C));}function
auto_increment(){return"";}function
alter_table($Q,$C,$n,$Jc,$mb,$jc,$d,$Ja,$cf){$c=array();$Bf=array();foreach($n
as$m){$e=idf_escape($m[0]);$X=$m[1];if(!$X)$c[]="DROP $e";else{$Gh=$X[5];unset($X[5]);if(isset($X[6])&&$m[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($m[0]=="")$c[]=($Q!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$Bf[]="ALTER TABLE ".table($Q)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($m[0]!=""||$Gh!="")$Bf[]="COMMENT ON COLUMN ".table($Q).".$X[0] IS ".($Gh!=""?substr($Gh,9):"''");}}$c=array_merge($c,$Jc);if($Q=="")array_unshift($Bf,"CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($Bf,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""&&$Q!=$C)$Bf[]="ALTER TABLE ".table($Q)." RENAME TO ".table($C);if($Q!=""||$mb!="")$Bf[]="COMMENT ON TABLE ".table($C)." IS ".q($mb);if($Ja!=""){}foreach($Bf
as$H){if(!queries($H))return
false;}return
true;}function
alter_indexes($Q,$c){$xb=array();$Ub=array();$Bf=array();foreach($c
as$X){if($X[0]!="INDEX")$xb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").$X[2]);elseif($X[2]=="DROP")$Ub[]=idf_escape($X[1]);else$Bf[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." $X[2]";}if($xb)array_unshift($Bf,"ALTER TABLE ".table($Q).implode(",",$xb));if($Ub)array_unshift($Bf,"DROP INDEX ".implode(", ",$Ub));foreach($Bf
as$H){if(!queries($H))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($Mh){return
queries("DROP VIEW ".implode(", ",array_map('table',$Mh)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Mh,$Pg){foreach($S
as$Q){if(!queries("ALTER TABLE ".table($Q)." SET SCHEMA ".idf_escape($Pg)))return
false;}foreach($Mh
as$Q){if(!queries("ALTER VIEW ".table($Q)." SET SCHEMA ".idf_escape($Pg)))return
false;}return
true;}function
trigger($C){if($C=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$L=get_rows('SELECT trigger_name AS "Trigger", condition_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers WHERE event_object_table = '.q($_GET["trigger"]).' AND trigger_name = '.q($C));return
reset($L);}function
triggers($Q){$J=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($Q))as$K)$J[$K["trigger_name"]]=array($K["condition_timing"],$K["event_manipulation"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routines(){return
get_rows('SELECT p.proname AS "ROUTINE_NAME", p.proargtypes AS "ROUTINE_TYPE", pg_catalog.format_type(p.prorettype, NULL) AS "DTD_IDENTIFIER"
FROM pg_catalog.pg_namespace n
JOIN pg_catalog.pg_proc p ON p.pronamespace = n.oid
WHERE n.nspname = current_schema()
ORDER BY p.proname');}function
routine_languages(){return
get_vals("SELECT langname FROM pg_catalog.pg_language");}function
last_id(){return
0;}function
explain($g,$H){return$g->query("EXPLAIN $H");}function
found_rows($R,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Nf))return$Nf[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($dg){global$g,$rh,$_g;$J=$g->query("SET search_path TO ".idf_escape($dg));foreach(types()as$U){if(!isset($rh[$U])){$rh[$U]=0;$_g['User types'][]=$U;}}return$J;}function
use_sql($Cb){return"\connect ".idf_escape($Cb);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){global$g;return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".($g->server_info<9.2?"procpid":"pid"));}function
show_status(){}function
convert_field($m){}function
unconvert_field($m,$J){return$J;}function
support($Cc){return
preg_match('~^(database|table|columns|sql|indexes|comment|view|scheme|processlist|sequence|trigger|type|variables|drop_col)$~',$Cc);}$w="pgsql";$rh=array();$_g=array();foreach(array('Numbers'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Date and time'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Strings'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binary'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Network'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometry'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$x=>$X){$rh+=$X;$_g[$x]=array_keys($X);}$yh=array();$He=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Sc=array("char_length","lower","round","to_hex","to_timestamp","upper");$Wc=array("avg","count","count distinct","max","min","sum");$bc=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Tb["oracle"]="Oracle";if(isset($_GET["oracle"])){$pf=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($mc,$l){if(ini_bool("html_errors"))$l=html_entity_decode(strip_tags($l));$l=preg_replace('~^[^:]*: ~','',$l);$this->error=$l;}function
connect($N,$V,$G){$this->_link=@oci_new_connect($V,$G,$N,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$l=oci_error();$this->error=$l["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($Cb){return
true;}function
query($H,$sh=false){$I=oci_parse($this->_link,$H);$this->error="";if(!$I){$l=oci_error($this->_link);$this->errno=$l["code"];$this->error=$l["message"];return
false;}set_error_handler(array($this,'_error'));$J=@oci_execute($I);restore_error_handler();if($J){if(oci_num_fields($I))return
new
Min_Result($I);$this->affected_rows=oci_num_rows($I);}return$J;}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$m=1){$I=$this->query($H);if(!is_object($I)||!oci_fetch($I->_result))return
false;return
oci_result($I->_result,$m);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
Min_Result($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$x=>$X){if(is_a($X,'OCI-Lob'))$K[$x]=$X->load();}return$K;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;$J->name=oci_field_name($this->_result,$e);$J->orgname=$J->name;$J->type=oci_field_type($this->_result,$e);$J->charsetnr=(preg_match("~raw|blob|bfile~",$J->type)?63:0);return$J;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($N,$V,$G){$this->dsn("oci:dbname=//$N;charset=AL32UTF8",$V,$G);return
true;}function
select_db($Cb){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($H,$Z,$z,$D=0,$kg=" "){return($D?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $H$Z) t WHERE rownum <= ".($z+$D).") WHERE rnum > $D":($z!==null?" * FROM (SELECT $H$Z) WHERE rownum <= ".($z+$D):" $H$Z"));}function
limit1($H,$Z){return" $H$Z";}function
db_collation($k,$ib){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($j){return
array();}function
table_status($C=""){$J=array();$fg=q($C);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($C!=""?" AND table_name = $fg":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($C!=""?" WHERE view_name = $fg":"")."
ORDER BY 1")as$K){if($C!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$J=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)." ORDER BY column_id")as$K){$U=$K["DATA_TYPE"];$y="$K[DATA_PRECISION],$K[DATA_SCALE]";if($y==",")$y=$K["DATA_LENGTH"];$J[$K["COLUMN_NAME"]]=array("field"=>$K["COLUMN_NAME"],"full_type"=>$U.($y?"($y)":""),"type"=>strtolower($U),"length"=>$y,"default"=>$K["DATA_DEFAULT"],"null"=>($K["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$J;}function
indexes($Q,$h=null){$J=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($Q)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$K){$kd=$K["INDEX_NAME"];$J[$kd]["type"]=($K["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($K["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$J[$kd]["columns"][]=$K["COLUMN_NAME"];$J[$kd]["lengths"][]=($K["CHAR_LENGTH"]&&$K["CHAR_LENGTH"]!=$K["COLUMN_LENGTH"]?$K["CHAR_LENGTH"]:null);$J[$kd]["descs"][]=($K["DESCEND"]?'1':null);}return$J;}function
view($C){$L=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($C));return
reset($L);}function
collations(){return
array();}function
information_schema($k){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$H){$g->query("EXPLAIN PLAN FOR $H");return$g->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
alter_table($Q,$C,$n,$Jc,$mb,$jc,$d,$Ja,$cf){$c=$Ub=array();foreach($n
as$m){$X=$m[1];if($X&&$m[0]!=""&&idf_escape($m[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($m[0])." TO $X[0]");if($X)$c[]=($Q!=""?($m[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$Ub[]=idf_escape($m[0]);}if($Q=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$Ub||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$Ub).")"))&&($Q==$C||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($C)));}function
foreign_keys($Q){return
array();}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Mh){return
apply_queries("DROP VIEW",$Mh);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($eg){global$g;return$g->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($eg));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$L=get_rows('SELECT * FROM v$instance');return
reset($L);}function
convert_field($m){}function
unconvert_field($m,$J){return$J;}function
support($Cc){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Cc);}$w="oracle";$rh=array();$_g=array();foreach(array('Numbers'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Date and time'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Strings'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binary'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$x=>$X){$rh+=$X;$_g[$x]=array_keys($X);}$yh=array();$He=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Sc=array("length","lower","round","upper");$Wc=array("avg","count","count distinct","max","min","sum");$bc=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Tb["mssql"]="MS SQL";if(isset($_GET["mssql"])){$pf=array("SQLSRV","MSSQL");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$l){$this->errno=$l["code"];$this->error.="$l[message]\n";}$this->error=rtrim($this->error);}function
connect($N,$V,$G){$this->_link=@sqlsrv_connect($N,array("UID"=>$V,"PWD"=>$G,"CharacterSet"=>"UTF-8"));if($this->_link){$od=sqlsrv_server_info($this->_link);$this->server_info=$od['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($Cb){return$this->query("USE ".idf_escape($Cb));}function
query($H,$sh=false){$I=sqlsrv_query($this->_link,$H);$this->error="";if(!$I){$this->_get_error();return
false;}return$this->store_result($I);}function
multi_query($H){$this->_result=sqlsrv_query($this->_link,$H);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($I=null){if(!$I)$I=$this->_result;if(sqlsrv_field_metadata($I))return
new
Min_Result($I);$this->affected_rows=sqlsrv_rows_affected($I);return
true;}function
next_result(){return
sqlsrv_next_result($this->_result);}function
result($H,$m=0){$I=$this->query($H);if(!is_object($I))return
false;$K=$I->fetch_row();return$K[$m];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$x=>$X){if(is_a($X,'DateTime'))$K[$x]=$X->format("Y-m-d H:i:s");}return$K;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC,SQLSRV_SCROLL_NEXT));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC,SQLSRV_SCROLL_NEXT));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$m=$this->_fields[$this->_offset++];$J=new
stdClass;$J->name=$m["Name"];$J->orgname=$m["Name"];$J->type=($m["Type"]==1?254:0);return$J;}function
seek($D){for($r=0;$r<$D;$r++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($N,$V,$G){$this->_link=@mssql_connect($N,$V,$G);if($this->_link){$I=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$K=$I->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$K[0]] $K[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($Cb){return
mssql_select_db($Cb);}function
query($H,$sh=false){$I=mssql_query($H,$this->_link);$this->error="";if(!$I){$this->error=mssql_get_last_message();return
false;}if($I===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result);}function
result($H,$m=0){$I=$this->query($H);if(!is_object($I))return
false;return
mssql_result($I->_result,0,$m);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($I){$this->_result=$I;$this->num_rows=mssql_num_rows($I);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$J=mssql_fetch_field($this->_result);$J->orgtable=$J->table;$J->orgname=$J->name;return$J;}function
seek($D){mssql_data_seek($this->_result,$D);}function
__destruct(){mssql_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$L,$sf){foreach($L
as$O){$zh=array();$Z=array();foreach($O
as$x=>$X){$zh[]="$x = $X";if(isset($sf[idf_unescape($x)]))$Z[]="$x = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$O).")) AS source (c".implode(", c",range(1,count($O))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$zh)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($t){return"[".str_replace("]","]]",$t)."]";}function
table($t){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($t);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("EXEC sp_databases");}function
limit($H,$Z,$z,$D=0,$kg=" "){return($z!==null?" TOP (".($z+$D).")":"")." $H$Z";}function
limit1($H,$Z){return
limit($H,$Z,1);}function
db_collation($k,$ib){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name =  ".q($k));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($j){global$g;$J=array();foreach($j
as$k){$g->select_db($k);$J[$k]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$J;}function
table_status($C=""){$J=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$K){if($C!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$J=array();foreach(get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$K){$U=$K["type"];$y=(preg_match("~char|binary~",$U)?$K["max_length"]:($U=="decimal"?"$K[precision],$K[scale]":""));$J[$K["name"]]=array("field"=>$K["name"],"full_type"=>$U.($y?"($y)":""),"type"=>$U,"length"=>$y,"default"=>$K["default"],"null"=>$K["is_nullable"],"auto_increment"=>$K["is_identity"],"collation"=>$K["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$K["is_identity"],);}return$J;}function
indexes($Q,$h=null){$J=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$h)as$K){$C=$K["name"];$J[$C]["type"]=($K["is_primary_key"]?"PRIMARY":($K["is_unique"]?"UNIQUE":"INDEX"));$J[$C]["lengths"]=array();$J[$C]["columns"][$K["key_ordinal"]]=$K["column_name"];$J[$C]["descs"][$K["key_ordinal"]]=($K["is_descending_key"]?'1':null);}return$J;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($C))));}function
collations(){$J=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$J[preg_replace('~_.*~','',$d)][]=$d;return$J;}function
information_schema($k){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$g->error)));}function
create_database($k,$d){return
queries("CREATE DATABASE ".idf_escape($k).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($j){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$j)));}function
rename_database($C,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($C));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".(+$_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$C,$n,$Jc,$mb,$jc,$d,$Ja,$cf){$c=array();foreach($n
as$m){$e=idf_escape($m[0]);$X=$m[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($m[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($Jc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($C)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$C)queries("EXEC sp_rename ".q(table($Q)).", ".q($C));if($Jc)$c[""]=$Jc;foreach($c
as$x=>$X){if(!queries("ALTER TABLE ".idf_escape($C)." $x".implode(",",$X)))return
false;}return
true;}function
alter_indexes($Q,$c){$u=array();$Ub=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Ub[]=idf_escape($X[1]);else$u[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." $X[2]"))return
false;}return(!$u||queries("DROP INDEX ".implode(", ",$u)))&&(!$Ub||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$Ub)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$H){$g->query("SET SHOWPLAN_ALL ON");$J=$g->query($H);$g->query("SET SHOWPLAN_ALL OFF");return$J;}function
found_rows($R,$Z){}function
foreign_keys($Q){$J=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$K){$o=&$J[$K["FK_NAME"]];$o["table"]=$K["PKTABLE_NAME"];$o["source"][]=$K["FKCOLUMN_NAME"];$o["target"][]=$K["PKCOLUMN_NAME"];}return$J;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Mh){return
queries("DROP VIEW ".implode(", ",array_map('table',$Mh)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Mh,$Pg){return
apply_queries("ALTER SCHEMA ".idf_escape($Pg)." TRANSFER",array_merge($S,$Mh));}function
trigger($C){if($C=="")return
array();$L=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($C));$J=reset($L);if($J)$J["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$J["text"]);return$J;}function
triggers($Q){$J=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$K)$J[$K["name"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($dg){return
true;}function
use_sql($Cb){return"USE ".idf_escape($Cb);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($m){}function
unconvert_field($m,$J){return$J;}function
support($Cc){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$Cc);}$w="mssql";$rh=array();$_g=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Date and time'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Strings'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binary'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$x=>$X){$rh+=$X;$_g[$x]=array_keys($X);}$yh=array();$He=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Sc=array("len","lower","round","upper");$Wc=array("avg","count","count distinct","max","min","sum");$bc=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Tb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$pf=array("SimpleXML");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($Cb){return($Cb=="domain");}function
query($H,$sh=false){$F=array('SelectExpression'=>$H,'ConsistentRead'=>'true');if($this->next)$F['NextToken']=$this->next;$I=sdb_request_all('Select','Item',$F,$this->timeout);if($I===false)return$I;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$H)){$Dg=0;foreach($I
as$yd)$Dg+=$yd->Attribute->Value;$I=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Dg,))));}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
Min_Result($I){foreach($I
as$yd){$K=array();if($yd->Name!='')$K['itemName()']=(string)$yd->Name;foreach($yd->Attribute
as$Ga){$C=$this->_processValue($Ga->Name);$Y=$this->_processValue($Ga->Value);if(isset($K[$C])){$K[$C]=(array)$K[$C];$K[$C][]=$Y;}else$K[$C]=$Y;}$this->_rows[]=$K;foreach($K
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($dc){return(is_object($dc)&&$dc['encoding']=='base64'?base64_decode($dc):(string)$dc);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$x=>$X)$J[$x]=$K[$x];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$Dd=array_keys($this->_rows[0]);return(object)array('name'=>$Dd[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{function
_chunkRequest($hd,$ua,$F,$vc=array()){global$g;foreach(array_chunk($hd,25)as$bb){$Ye=$F;foreach($bb
as$r=>$s){$Ye["Item.$r.ItemName"]=$s;foreach($vc
as$x=>$X)$Ye["Item.$r.$x"]=$X;}if(!sdb_request($ua,$Ye))return
false;}$g->affected_rows=count($hd);return
true;}function
_extractIds($Q,$Cf,$z){$J=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$Cf,$Wd))$J=array_map('idf_unescape',$Wd[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($Q).$Cf.($z?" LIMIT 1":"")))as$yd)$J[]=$yd->Name;}return$J;}function
select($Q,$M,$Z,$q,$Me,$z,$E){global$g;$g->next=$_GET["next"];$J=parent::select($Q,$M,$Z,$q,$Me,$z,$E);$g->next=0;return$J;}function
delete($Q,$Cf,$z=0){return$this->_chunkRequest($this->_extractIds($Q,$Cf,$z),'BatchDeleteAttributes',array('DomainName'=>$Q));}function
update($Q,$O,$Cf,$z=0,$kg="\n"){$Ib=array();$sd=array();$r=0;$hd=$this->_extractIds($Q,$Cf,$z);$s=idf_unescape($O["`itemName()`"]);unset($O["`itemName()`"]);foreach($O
as$x=>$X){$x=idf_unescape($x);if($X=="NULL"||($s!=""&&array($s)!=$hd))$Ib["Attribute.".count($Ib).".Name"]=$x;if($X!="NULL"){foreach((array)$X
as$_d=>$W){$sd["Attribute.$r.Name"]=$x;$sd["Attribute.$r.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$_d)$sd["Attribute.$r.Replace"]="true";$r++;}}}$F=array('DomainName'=>$Q);return(!$sd||$this->_chunkRequest(($s!=""?array($s):$hd),'BatchPutAttributes',$F,$sd))&&(!$Ib||$this->_chunkRequest($hd,'BatchDeleteAttributes',$F,$Ib));}function
insert($Q,$O){$F=array("DomainName"=>$Q);$r=0;foreach($O
as$C=>$Y){if($Y!="NULL"){$C=idf_unescape($C);if($C=="itemName()")$F["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$F["Attribute.$r.Name"]=$C;$F["Attribute.$r.Value"]=(is_array($Y)?$X:idf_unescape($Y));$r++;}}}}return
sdb_request('PutAttributes',$F);}function
insertUpdate($Q,$L,$sf){foreach($L
as$O){if(!$this->update($Q,$O,"WHERE `itemName()` = ".q($O["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}}function
connect(){return
new
Min_DB;}function
support($Cc){return
preg_match('~sql~',$Cc);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($k,$ib){}function
tables_list(){global$g;$J=array();foreach(sdb_request_all('ListDomains','DomainName')as$Q)$J[(string)$Q]='table';if($g->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$J;}function
table_status($C="",$Bc=false){$J=array();foreach(($C!=""?array($C=>true):tables_list())as$Q=>$U){$K=array("Name"=>$Q,"Auto_increment"=>"");if(!$Bc){$je=sdb_request('DomainMetadata',array('DomainName'=>$Q));if($je){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$x=>$X)$K[$x]=(string)$je->$X;}}if($C!="")return$K;$J[$Q]=$K;}return$J;}function
explain($g,$H){}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($Q){$J=array();foreach((array)$_POST["field_keys"]as$x=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$x];$_POST["fields"][$X]=$_POST["field_vals"][$x];}}foreach((array)$_POST["fields"]as$x=>$X){$C=bracket_escape($x,1);$J[$C]=array("field"=>$C,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1);}return$J;}function
foreign_keys($Q){return
array();}function
table($t){return
idf_escape($t);}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
limit($H,$Z,$z,$D=0,$kg=" "){return" $H$Z".($z!==null?$kg."LIMIT $z":"");}function
unconvert_field($m,$J){return$J;}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$C,$n,$Jc,$mb,$jc,$d,$Ja,$cf){return($Q==""&&sdb_request('CreateDomain',array('DomainName'=>$C)));}function
drop_tables($S){foreach($S
as$Q){if(!sdb_request('DeleteDomain',array('DomainName'=>$Q)))return
false;}return
true;}function
count_tables($j){foreach($j
as$k)return
array($k=>count(tables_list()));}function
found_rows($R,$Z){return($Z?null:$R["Rows"]);}function
last_id(){}function
hmac($_a,$Ab,$x,$Gf=false){$Sa=64;if(strlen($x)>$Sa)$x=pack("H*",$_a($x));$x=str_pad($x,$Sa,"\0");$Ad=$x^str_repeat("\x36",$Sa);$Bd=$x^str_repeat("\x5C",$Sa);$J=$_a($Bd.pack("H*",$_a($Ad.$Ab)));if($Gf)$J=pack("H*",$J);return$J;}function
sdb_request($ua,$F=array()){global$b,$g;list($dd,$F['AWSAccessKeyId'],$gg)=$b->credentials();$F['Action']=$ua;$F['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$F['Version']='2009-04-15';$F['SignatureVersion']=2;$F['SignatureMethod']='HmacSHA1';ksort($F);$H='';foreach($F
as$x=>$X)$H.='&'.rawurlencode($x).'='.rawurlencode($X);$H=str_replace('%7E','~',substr($H,1));$H.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$dd)."\n/\n$H",$gg,true)));@ini_set('track_errors',1);$Ec=@file_get_contents((preg_match('~^https?://~',$dd)?$dd:"http://$dd"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$H,'ignore_errors'=>1,))));if(!$Ec){$g->error=$jf;return
false;}libxml_use_internal_errors(true);$Sh=simplexml_load_string($Ec);if(!$Sh){$l=libxml_get_last_error();$g->error=$l->message;return
false;}if($Sh->Errors){$l=$Sh->Errors->Error;$g->error="$l->Message ($l->Code)";return
false;}$g->error='';$Og=$ua."Result";return($Sh->$Og?$Sh->$Og:true);}function
sdb_request_all($ua,$Og,$F=array(),$Xg=0){$J=array();$wg=($Xg?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$F['SelectExpression'],$B)?$B[1]:0);do{$Sh=sdb_request($ua,$F);if(!$Sh)break;foreach($Sh->$Og
as$dc)$J[]=$dc;if($z&&count($J)>=$z){$_GET["next"]=$Sh->NextToken;break;}if($Xg&&microtime(true)-$wg>$Xg)return
false;$F['NextToken']=$Sh->NextToken;if($z)$F['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($J),$F['SelectExpression']);}while($Sh->NextToken);return$J;}$w="simpledb";$He=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$Sc=array();$Wc=array("count");$bc=array(array("json"));}$Tb["mongo"]="MongoDB (beta)";if(isset($_GET["mongo"])){$pf=array("mongo");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$_link,$_db;function
connect($N,$V,$G){global$b;$k=$b->database();$Ke=array();if($V!=""){$Ke["username"]=$V;$Ke["password"]=$G;}if($k!="")$Ke["db"]=$k;try{$this->_link=new
MongoClient("mongodb://$N",$Ke);return
true;}catch(Exception$qc){$this->error=$qc->getMessage();return
false;}}function
query($H){return
false;}function
select_db($Cb){try{$this->_db=$this->_link->selectDB($Cb);return
true;}catch(Exception$qc){$this->error=$qc->getMessage();return
false;}}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
Min_Result($I){foreach($I
as$yd){$K=array();foreach($yd
as$x=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$x]=63;$K[$x]=(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X))));}$this->_rows[]=$K;foreach($K
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$x=>$X)$J[$x]=$K[$x];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$Dd=array_keys($this->_rows[0]);$C=$Dd[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$M,$Z,$q,$Me,$z,$E){global$g;if($M==array("*"))$M=array();else$M=array_fill_keys($M,true);$J=array();foreach($g->_db->selectCollection($Q)->find(array(),$M)as$X)$J[]=$X;return
new
Min_Result($J);}}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
error(){global$g;return
h($g->error);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases($Ic){global$g;$J=array();$Fb=$g->_link->listDBs();foreach($Fb['databases']as$k)$J[]=$k['name'];return$J;}function
collations(){return
array();}function
db_collation($k,$ib){}function
count_tables($j){return
array();}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
table_status($C="",$Bc=false){$J=array();foreach(tables_list()as$Q=>$U){$J[$Q]=array("Name"=>$Q);if($C==$Q)return$J[$Q];}return$J;}function
information_schema(){}function
is_view($R){}function
drop_databases($j){global$g;foreach($j
as$k){$Rf=$g->_link->selectDB($k)->drop();if(!$Rf['ok'])return
false;}return
true;}function
indexes($Q,$h=null){global$g;$J=array();foreach($g->_db->selectCollection($Q)->getIndexInfo()as$u){$Lb=array();foreach($u["key"]as$e=>$U)$Lb[]=($U==-1?'1':null);$J[$u["name"]]=array("type"=>($u["name"]=="_id_"?"PRIMARY":($u["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($u["key"]),"descs"=>$Lb,);}return$J;}function
fields($Q){return
array("_id"=>array("field"=>"_id","auto_increment"=>true,"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),));}function
convert_field($m){}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
found_rows($R,$Z){return
null;}function
alter_table($Q,$C,$n,$Jc,$mb,$jc,$d,$Ja,$cf){global$g;if($Q==""){$g->_db->createCollection($C);return
true;}}function
drop_tables($S){global$g;foreach($S
as$Q){$Rf=$g->_db->selectCollection($Q)->drop();if(!$Rf['ok'])return
false;}return
true;}function
truncate_tables($S){global$g;foreach($S
as$Q){$Rf=$g->_db->selectCollection($Q)->remove();if(!$Rf['ok'])return
false;}return
true;}function
table($t){return$t;}function
idf_escape($t){return$t;}function
support($Cc){return
preg_match("~database|table|indexes~",$Cc);}$w="mongo";$He=array("=");$Sc=array();$Wc=array();$bc=array(array("json"));}$Tb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$pf=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
query($ff,$rb=array()){@ini_set('track_errors',1);$Ec=@file_get_contents($this->_url.($this->_db!=""?"$this->_db/":"").$ff,false,stream_context_create(array('http'=>array('content'=>json_encode($rb),'ignore_errors'=>1,))));if(!$Ec){$this->error=$jf;return$Ec;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$fd[0])){$this->error=$Ec;return
false;}$J=json_decode($Ec,true);if(!$J){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$qb=get_defined_constants(true);foreach($qb['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return$J;}function
connect($N,$V,$G){$this->_url="http://$V:$G@$N/";$J=$this->query('');if($J)$this->server_info=$J['version']['number'];return(bool)$J;}function
select_db($Cb){$this->_db=$Cb;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
Min_Result($L){$this->num_rows=count($this->_rows);$this->_rows=$L;reset($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);next($this->_rows);return$J;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$M,$Z,$q,$Me,$z,$E){global$b;$H=$b->selectQueryBuild($M,$Z,$q,$Me,$z,$E);$Ab=array();if(!$H){$H="$Q/_search";if($M!=array("*"))$Ab["fields"]=$M;if($Me){$rg=array();foreach($Me
as$gb){$gb=preg_replace('~ DESC$~','',$gb,1,$wb);$rg[]=($wb?array($gb=>"desc"):$gb);}$Ab["sort"]=$rg;}if($z){$Ab["size"]=+$z;if($E)$Ab["from"]=($E*$z);}foreach((array)$_GET["where"]as$X){if("$X[col]$X[val]"!=""){$Sg=array("match"=>array(($X["col"]!=""?$X["col"]:"_all")=>$X["val"]));if($X["op"]=="=")$Ab["query"]["filtered"]["filter"]["and"][]=$Sg;else$Ab["query"]["filtered"]["query"]["bool"]["must"][]=$Sg;}}if($Ab["query"]&&!$Ab["query"]["filtered"]["query"])$Ab["query"]["filtered"]["query"]=array("match_all"=>array());}echo$b->selectQuery($H);$fg=$this->_conn->query($H,$Ab);if(!$fg)return
false;$J=array();foreach($fg['hits']['hits']as$cd){$K=array();$n=$cd['_source'];if($M!=array("*")){$n=array();foreach($M
as$x)$n[$x]=$cd['fields'][$x];}foreach($n
as$x=>$X)$K[$x]=(is_array($X)?json_encode($X):$X);$J[]=$K;}return
new
Min_Result($J);}}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
support($Cc){return
preg_match("~database|table|columns~",$Cc);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){global$g;$J=$g->query('_aliases');if($J)$J=array_keys($J);return$J;}function
collations(){return
array();}function
db_collation($k,$ib){}function
count_tables($j){global$g;$J=$g->query('_mapping');if($J)$J=array_map('count',$J);return$J;}function
tables_list(){global$g;$J=$g->query('_mapping');if($J)$J=array_fill_keys(array_keys(reset($J)),'table');return$J;}function
table_status($C="",$Bc=false){$J=tables_list();if($J){foreach($J
as$x=>$U){$J[$x]=array("Name"=>$x,"Engine"=>$U);if($C!="")return$J[$C];}}return$J;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$g;$Ud=$g->query("$Q/_mapping");$J=array();if($Ud){foreach($Ud[$Q]['properties']as$C=>$m)$J[$C]=array("field"=>$C,"full_type"=>$m["type"],"type"=>$m["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$J;}function
foreign_keys($Q){return
array();}function
table($t){return$t;}function
idf_escape($t){return$t;}function
convert_field($m){}function
unconvert_field($m,$J){return$J;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}$w="elastic";$He=array("=","query");$Sc=array();$Wc=array();$bc=array(array("json"));}$Tb=array("server"=>"MySQL")+$Tb;if(!defined("DRIVER")){$pf=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($N,$V,$G){mysqli_report(MYSQLI_REPORT_OFF);list($dd,$lf)=explode(":",$N,2);$J=@$this->real_connect(($N!=""?$dd:ini_get("mysqli.default_host")),($N.$V!=""?$V:ini_get("mysqli.default_user")),($N.$V.$G!=""?$G:ini_get("mysqli.default_pw")),null,(is_numeric($lf)?$lf:ini_get("mysqli.default_port")),(!is_numeric($lf)?$lf:null));if($J){if(method_exists($this,'set_charset'))$this->set_charset("utf8");else$this->query("SET NAMES utf8");}return$J;}function
result($H,$m=0){$I=$this->query($H);if(!$I)return
false;$K=$I->fetch_array();return$K[$m];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$G){$this->_link=@mysql_connect(($N!=""?$N:ini_get("mysql.default_host")),("$N$V"!=""?$V:ini_get("mysql.default_user")),("$N$V$G"!=""?$G:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);if(function_exists('mysql_set_charset'))mysql_set_charset("utf8",$this->_link);else$this->query("SET NAMES utf8");}else$this->error=mysql_error();return(bool)$this->_link;}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($Cb){return
mysql_select_db($Cb,$this->_link);}function
query($H,$sh=false){$I=@($sh?mysql_unbuffered_query($H,$this->_link):mysql_query($H,$this->_link));$this->error="";if(!$I){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($I===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$m=0){$I=$this->query($H);if(!$I||!$I->num_rows)return
false;return
mysql_result($I->_result,0,$m);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
Min_Result($I){$this->_result=$I;$this->num_rows=mysql_num_rows($I);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$J=mysql_fetch_field($this->_result,$this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=($J->blob?63:0);return$J;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($N,$V,$G){$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$N)),$V,$G);$this->query("SET NAMES utf8");return
true;}function
select_db($Cb){return$this->query("USE ".idf_escape($Cb));}function
query($H,$sh=false){$this->setAttribute(1000,!$sh);return
parent::query($H,$sh);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$O){return($O?parent::insert($Q,$O):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$L,$sf){$f=array_keys(reset($L));$qf="INSERT INTO ".table($Q)." (".implode(", ",$f).") VALUES\n";$Hh=array();foreach($f
as$x)$Hh[$x]="$x = VALUES($x)";$Cg="\nON DUPLICATE KEY UPDATE ".implode(", ",$Hh);$Hh=array();$y=0;foreach($L
as$O){$Y="(".implode(", ",$O).")";if($Hh&&(strlen($qf)+$y+strlen($Y)+strlen($Cg)>1e6)){if(!queries($qf.implode(",\n",$Hh).$Cg))return
false;$Hh=array();$y=0;}$Hh[]=$Y;$y+=strlen($Y)+2;}return
queries($qf.implode(",\n",$Hh).$Cg);}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2])){$g->query("SET sql_quote_show_create = 1, autocommit = 1");return$g;}$J=$g->error;if(function_exists('iconv')&&!is_utf8($J)&&strlen($bg=iconv("windows-1250","utf-8",$J))>strlen($J))$J=$bg;return$J;}function
get_databases($Ic){global$g;$J=get_session("dbs");if($J===null){$H=($g->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$J=($Ic?slow_query($H):get_vals($H));restart_session();set_session("dbs",$J);stop_session();}return$J;}function
limit($H,$Z,$z,$D=0,$kg=" "){return" $H$Z".($z!==null?$kg."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($H,$Z){return
limit($H,$Z,1);}function
db_collation($k,$ib){global$g;$J=null;$xb=$g->result("SHOW CREATE DATABASE ".idf_escape($k),1);if(preg_match('~ COLLATE ([^ ]+)~',$xb,$B))$J=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$xb,$B))$J=$ib[$B[1]][-1];return$J;}function
engines(){$J=array();foreach(get_rows("SHOW ENGINES")as$K){if(preg_match("~YES|DEFAULT~",$K["Support"]))$J[]=$K["Engine"];}return$J;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){global$g;return
get_key_vals($g->server_info>=5?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($j){$J=array();foreach($j
as$k)$J[$k]=count(get_vals("SHOW TABLES IN ".idf_escape($k)));return$J;}function
table_status($C="",$Bc=false){global$g;$J=array();foreach(get_rows($Bc&&$g->server_info>=5?"SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($C!=""?"AND TABLE_NAME = ".q($C):"ORDER BY Name"):"SHOW TABLE STATUS".($C!=""?" LIKE ".q(addcslashes($C,"%_\\")):""))as$K){if($K["Engine"]=="InnoDB")$K["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$K["Comment"]);if(!isset($K["Engine"]))$K["Comment"]="";if($C!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"]);}function
fields($Q){$J=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$K){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$K["Type"],$B);$J[$K["Field"]]=array("field"=>$K["Field"],"full_type"=>$K["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($K["Default"]!=""||preg_match("~char|set~",$B[1])?$K["Default"]:null),"null"=>($K["Null"]=="YES"),"auto_increment"=>($K["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$K["Extra"],$B)?$B[1]:""),"collation"=>$K["Collation"],"privileges"=>array_flip(preg_split('~, *~',$K["Privileges"])),"comment"=>$K["Comment"],"primary"=>($K["Key"]=="PRI"),);}return$J;}function
indexes($Q,$h=null){$J=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$h)as$K){$J[$K["Key_name"]]["type"]=($K["Key_name"]=="PRIMARY"?"PRIMARY":($K["Index_type"]=="FULLTEXT"?"FULLTEXT":($K["Non_unique"]?"INDEX":"UNIQUE")));$J[$K["Key_name"]]["columns"][]=$K["Column_name"];$J[$K["Key_name"]]["lengths"][]=$K["Sub_part"];$J[$K["Key_name"]]["descs"][]=null;}return$J;}function
foreign_keys($Q){global$g,$De;static$hf='`(?:[^`]|``)+`';$J=array();$yb=$g->result("SHOW CREATE TABLE ".table($Q),1);if($yb){preg_match_all("~CONSTRAINT ($hf) FOREIGN KEY \\(((?:$hf,? ?)+)\\) REFERENCES ($hf)(?:\\.($hf))? \\(((?:$hf,? ?)+)\\)(?: ON DELETE ($De))?(?: ON UPDATE ($De))?~",$yb,$Wd,PREG_SET_ORDER);foreach($Wd
as$B){preg_match_all("~$hf~",$B[2],$sg);preg_match_all("~$hf~",$B[5],$Pg);$J[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$sg[0]),"target"=>array_map('idf_unescape',$Pg[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$J;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$g->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$J=array();foreach(get_rows("SHOW COLLATION")as$K){if($K["Default"])$J[$K["Charset"]][-1]=$K["Collation"];else$J[$K["Charset"]][]=$K["Collation"];}ksort($J);foreach($J
as$x=>$X)asort($J[$x]);return$J;}function
information_schema($k){global$g;return($g->server_info>=5&&$k=="information_schema")||($g->server_info>=5.5&&$k=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
error_line(){global$g;if(preg_match('~ at line ([0-9]+)$~',$g->error,$Nf))return$Nf[1]-1;}function
create_database($k,$d){set_session("dbs",null);return
queries("CREATE DATABASE ".idf_escape($k).($d?" COLLATE ".q($d):""));}function
drop_databases($j){restart_session();set_session("dbs",null);return
apply_queries("DROP DATABASE",$j,'idf_escape');}function
rename_database($C,$d){if(create_database($C,$d)){$Pf=array();foreach(tables_list()as$Q=>$U)$Pf[]=table($Q)." TO ".idf_escape($C).".".table($Q);if(!$Pf||queries("RENAME TABLE ".implode(", ",$Pf))){queries("DROP DATABASE ".idf_escape(DB));return
true;}}return
false;}function
auto_increment(){$Ka=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$u){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$u["columns"],true)){$Ka="";break;}if($u["type"]=="PRIMARY")$Ka=" UNIQUE";}}return" AUTO_INCREMENT$Ka";}function
alter_table($Q,$C,$n,$Jc,$mb,$jc,$d,$Ja,$cf){$c=array();foreach($n
as$m)$c[]=($m[1]?($Q!=""?($m[0]!=""?"CHANGE ".idf_escape($m[0]):"ADD"):" ")." ".implode($m[1]).($Q!=""?$m[2]:""):"DROP ".idf_escape($m[0]));$c=array_merge($c,$Jc);$xg="COMMENT=".q($mb).($jc?" ENGINE=".q($jc):"").($d?" COLLATE ".q($d):"").($Ja!=""?" AUTO_INCREMENT=$Ja":"").$cf;if($Q=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n) $xg");if($Q!=$C)$c[]="RENAME TO ".table($C);$c[]=$xg;return
queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c));}function
alter_indexes($Q,$c){foreach($c
as$x=>$X)$c[$x]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"").$X[2]);return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Mh){return
queries("DROP VIEW ".implode(", ",array_map('table',$Mh)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Mh,$Pg){$Pf=array();foreach(array_merge($S,$Mh)as$Q)$Pf[]=table($Q)." TO ".idf_escape($Pg).".".table($Q);return
queries("RENAME TABLE ".implode(", ",$Pf));}function
copy_tables($S,$Mh,$Pg){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$C=($Pg==DB?table("copy_$Q"):idf_escape($Pg).".".table($Q));if(!queries("DROP TABLE IF EXISTS $C")||!queries("CREATE TABLE $C LIKE ".table($Q))||!queries("INSERT INTO $C SELECT * FROM ".table($Q)))return
false;}foreach($Mh
as$Q){$C=($Pg==DB?table("copy_$Q"):idf_escape($Pg).".".table($Q));$Lh=view($Q);if(!queries("DROP VIEW IF EXISTS $C")||!queries("CREATE VIEW $C AS $Lh[select]"))return
false;}return
true;}function
trigger($C){if($C=="")return
array();$L=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($C));return
reset($L);}function
triggers($Q){$J=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$K)$J[$K["Trigger"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){global$g,$lc,$qd,$rh;$Aa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$qh="((".implode("|",array_merge(array_keys($rh),$Aa)).")\\b(?:\\s*\\(((?:[^'\")]*|$lc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$hf="\\s*(".($U=="FUNCTION"?"":$qd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$qh";$xb=$g->result("SHOW CREATE $U ".idf_escape($C),2);preg_match("~\\(((?:$hf\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$qh\\s+":"")."(.*)~is",$xb,$B);$n=array();preg_match_all("~$hf\\s*,?~is",$B[1],$Wd,PREG_SET_ORDER);foreach($Wd
as$Xe){$C=str_replace("``","`",$Xe[2]).$Xe[3];$n[]=array("field"=>$C,"type"=>strtolower($Xe[5]),"length"=>preg_replace_callback("~$lc~s",'normalize_enum',$Xe[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Xe[8] $Xe[7]"))),"null"=>1,"full_type"=>$Xe[4],"inout"=>strtoupper($Xe[1]),"collation"=>strtolower($Xe[9]),);}if($U!="FUNCTION")return
array("fields"=>$n,"definition"=>$B[11]);return
array("fields"=>$n,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$H){return$g->query("EXPLAIN ".($g->server_info>=5.1?"PARTITIONS ":"").$H);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($dg){return
true;}function
create_sql($Q,$Ja){global$g;$J=$g->result("SHOW CREATE TABLE ".table($Q),1);if(!$Ja)$J=preg_replace('~ AUTO_INCREMENT=\\d+~','',$J);return$J;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($Cb){return"USE ".idf_escape($Cb);}function
trigger_sql($Q,$Ag){$J="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$K)$J.="\n".($Ag=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($K["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($K["Trigger"])." $K[Timing] $K[Event] ON ".table($K["Table"])." FOR EACH ROW\n$K[Statement];;\n";return$J;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($m){if(preg_match("~binary~",$m["type"]))return"HEX(".idf_escape($m["field"]).")";if($m["type"]=="bit")return"BIN(".idf_escape($m["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$m["type"]))return"AsWKT(".idf_escape($m["field"]).")";}function
unconvert_field($m,$J){if(preg_match("~binary~",$m["type"]))$J="UNHEX($J)";if($m["type"]=="bit")$J="CONV($J, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$m["type"]))$J="GeomFromText($J)";return$J;}function
support($Cc){global$g;return!preg_match("~scheme|sequence|type|view_trigger".($g->server_info<5.1?"|event|partitioning".($g->server_info<5?"|routine|trigger|view":""):"")."~",$Cc);}$w="sql";$rh=array();$_g=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$x=>$X){$rh+=$X;$_g[$x]=array_keys($X);}$yh=array("unsigned","zerofill","unsigned zerofill");$He=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Sc=array("char_length","date","from_unixtime","lower","round","sec_to_time","time_to_sec","upper");$Wc=array("avg","count","count distinct","group_concat","max","min","sum");$bc=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array("(^|[^o])int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.0.0";class
Adminer{var$operators;function
name(){return"<a href='http://www.adminer.org/' target='_blank' id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
permanentLogin($xb=false){return
password_file($xb);}function
database(){return
DB;}function
databases($Ic=true){return
get_databases($Ic);}function
schemas(){return
schemas();}function
queryTimeout(){return
5;}function
headers(){return
true;}function
head(){return
true;}function
loginForm(){global$Tb;echo'<table cellspacing="0">
<tr><th>System<td>',html_select("auth[driver]",$Tb,DRIVER,"loginDriver(this);"),'<tr><th>Server<td><input name="auth[server]" value="',h(SERVER),'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
<tr><th>Username<td><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>Password<td><input type="password" name="auth[password]">
<tr><th>Database<td><input name="auth[db]" value="',h($_GET["db"]);?>" autocapitalize="off">
</table>
<script type="text/javascript">
var username = document.getElementById('username');
focus(username);
username.form['auth[driver]'].onchange();
</script>
<?php

echo"<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
login($Sd,$G){return
true;}function
tableName($Gg){return
h($Gg["Name"]);}function
fieldName($m,$Me=0){return'<span title="'.h($m["full_type"]).'">'.h($m["field"]).'</span>';}function
selectLinks($Gg,$O=""){echo'<p class="links">';$Rd=array("select"=>'Select data');if(support("table")){$Rd["table"]='Show structure';if(is_view($Gg))$Rd["view"]='Alter view';else$Rd["create"]='Alter table';}if($O!==null)$Rd["edit"]='New item';foreach($Rd
as$x=>$X)echo" <a href='".h(ME)."$x=".urlencode($Gg["Name"]).($x=="edit"?$O:"")."'".bold(isset($_GET[$x])).">$X</a>";echo"\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Fg){return
array();}function
backwardKeysPrint($Ma,$K){}function
selectQuery($H){global$w;return($_GET["edit"]!=""?"":"<p><code class='jush-$w'>".h(str_replace("\n"," ",$H))."</code>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($H)."'>".'Edit'."</a>":"")."</p>");}function
rowDescription($Q){return"";}function
rowDescriptions($L,$Kc){return$L;}function
selectLink($X,$m){}function
selectVal($X,$_,$m){$J=($X===null?"<i>NULL</i>":(preg_match("~char|binary~",$m["type"])&&!preg_match("~var~",$m["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$m["type"])&&!is_utf8($X))$J=lang(array('%d byte','%d bytes'),strlen(html_entity_decode($X,ENT_QUOTES)));return($_?"<a href='".h($_)."'>$J</a>":$J);}function
editVal($X,$m){return$X;}function
selectColumnsPrint($M,$f){global$Sc,$Wc;print_fieldset("select",'Select',$M);$r=0;$M[""]=array();foreach($M
as$x=>$X){$X=$_GET["columns"][$x];$e=select_input(" name='columns[$r][col]' onchange='".($x!==""?"selectFieldChange(this.form)":"selectAddRow(this)").";'",$f,$X["col"]);echo"<div>".($Sc||$Wc?"<select name='columns[$r][fun]' onchange='helpClose();".($x!==""?"":" this.nextSibling.nextSibling.onchange();")."'".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).">".optionlist(array(-1=>"")+array_filter(array('Functions'=>$Sc,'Aggregation'=>$Wc)),$X["fun"])."</select>"."($e)":$e)."</div>\n";$r++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$f,$v){print_fieldset("search",'Search',$Z);foreach($v
as$r=>$u){if($u["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('h',$u["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$r]' value='".h($_GET["fulltext"][$r])."' onchange='selectFieldChange(this.form);'>",checkbox("boolean[$r]",1,isset($_GET["boolean"][$r]),"BOOL"),"<br>\n";}}$_GET["where"]=(array)$_GET["where"];reset($_GET["where"]);$Xa="this.nextSibling.onchange();";for($r=0;$r<=count($_GET["where"]);$r++){list(,$X)=each($_GET["where"]);if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$r][col]' onchange='$Xa'",$f,$X["col"],"(".'anywhere'.")"),html_select("where[$r][op]",$this->operators,$X["op"],$Xa),"<input type='search' name='where[$r][val]' value='".h($X["val"])."' onchange='".($X?"selectFieldChange(this.form)":"selectAddRow(this)").";' onkeydown='selectSearchKeydown(this, event);' onsearch='selectSearchSearch(this);'></div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($Me,$f,$v){print_fieldset("sort",'Sort',$Me);$r=0;foreach((array)$_GET["order"]as$x=>$X){if($X!=""){echo"<div>".select_input(" name='order[$r]' onchange='selectFieldChange(this.form);'",$f,$X),checkbox("desc[$r]",1,isset($_GET["desc"][$x]),'descending')."</div>\n";$r++;}}echo"<div>".select_input(" name='order[$r]' onchange='selectAddRow(this);'",$f),checkbox("desc[$r]",1,false,'descending')."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".'Limit'."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($z)."' onchange='selectFieldChange(this.form);'>","</div></fieldset>\n";}function
selectLengthPrint($Vg){if($Vg!==null){echo"<fieldset><legend>".'Text length'."</legend><div>","<input type='number' name='text_length' class='size' value='".h($Vg)."'>","</div></fieldset>\n";}}function
selectActionPrint($v){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>"," <span id='noindex' title='".'Full table scan'."'></span>","<script type='text/javascript'>\n","var indexColumns = ";$f=array();foreach($v
as$u){if($u["type"]!="FULLTEXT")$f[reset($u["columns"])]=1;}$f[""]=1;foreach($f
as$x=>$X)json_row($x);echo";\n","selectFieldChange(document.getElementById('form'));\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($fc,$f){}function
selectColumnsProcess($f,$v){global$Sc,$Wc;$M=array();$q=array();foreach((array)$_GET["columns"]as$x=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$Sc)||in_array($X["fun"],$Wc)))){$M[$x]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$Wc))$q[]=$M[$x];}}return
array($M,$q);}function
selectSearchProcess($n,$v){global$w;$J=array();foreach($v
as$r=>$u){if($u["type"]=="FULLTEXT"&&$_GET["fulltext"][$r]!="")$J[]="MATCH (".implode(", ",array_map('idf_escape',$u["columns"])).") AGAINST (".q($_GET["fulltext"][$r]).(isset($_GET["boolean"][$r])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$ob=" $X[op]";if(preg_match('~IN$~',$X["op"])){$jd=process_length($X["val"]);$ob.=" ".($jd!=""?$jd:"(NULL)");}elseif($X["op"]=="SQL")$ob=" $X[val]";elseif($X["op"]=="LIKE %%")$ob=" LIKE ".$this->processInput($n[$X["col"]],"%$X[val]%");elseif(!preg_match('~NULL$~',$X["op"]))$ob.=" ".$this->processInput($n[$X["col"]],$X["val"]);if($X["col"]!="")$J[]=idf_escape($X["col"]).$ob;else{$jb=array();foreach($n
as$C=>$m){$wd=preg_match('~char|text|enum|set~',$m["type"]);if((is_numeric($X["val"])||!preg_match('~(^|[^o])int|float|double|decimal|bit~',$m["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||$wd)){$C=idf_escape($C);$jb[]=($w=="sql"&&$wd&&!preg_match('~^utf8~',$m["collation"])?"CONVERT($C USING utf8)":$C);}}$J[]=($jb?"(".implode("$ob OR ",$jb)."$ob)":"0");}}}return$J;}function
selectOrderProcess($n,$v){$J=array();foreach((array)$_GET["order"]as$x=>$X){if($X!="")$J[]=(preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$x])?" DESC":"");}return$J;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$Kc){return
false;}function
selectQueryBuild($M,$Z,$q,$Me,$z,$E){return"";}function
messageQuery($H){global$w;restart_session();$ad=&get_session("queries");$s="sql-".count($ad[$_GET["db"]]);if(strlen($H)>1e6)$H=preg_replace('~[\x80-\xFF]+$~','',substr($H,0,1e6))."\n...";$ad[$_GET["db"]][]=array($H,time());return" <span class='time'>".@date("H:i:s")."</span> <a href='#$s' onclick=\"return !toggle('$s');\">".'SQL command'."</a>"."<div id='$s' class='hidden'><pre><code class='jush-$w'>".shorten_utf8($H,1000).'</code></pre>'.(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($ad[$_GET["db"]])-1)).'">'.'Edit'.'</a>':'').'</div>';}function
editFunctions($m){global$bc;$J=($m["null"]?"NULL/":"");foreach($bc
as$x=>$Sc){if(!$x||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($Sc
as$hf=>$X){if(!$hf||preg_match("~$hf~",$m["type"]))$J.="/$X";}if($x&&!preg_match('~set|blob|bytea|raw|file~',$m["type"]))$J.="/SQL";}}if($m["auto_increment"]&&!isset($_GET["select"])&&!where($_GET))$J='Auto Increment';return
explode("/",$J);}function
editInput($Q,$m,$Ha,$Y){if($m["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ha value='-1' checked><i>".'original'."</i></label> ":"").($m["null"]?"<label><input type='radio'$Ha value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ha,$m,$Y,0);return"";}function
processInput($m,$Y,$p=""){if($p=="SQL")return$Y;$C=$m["field"];$J=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$p))$J="$p()";elseif(preg_match('~^current_(date|timestamp)$~',$p))$J=$p;elseif(preg_match('~^([+-]|\\|\\|)$~',$p))$J=idf_escape($C)." $p $J";elseif(preg_match('~^[+-] interval$~',$p))$J=idf_escape($C)." $p ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+$~i",$Y)?$Y:$J);elseif(preg_match('~^(addtime|subtime|concat)$~',$p))$J="$p(".idf_escape($C).", $J)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$p))$J="$p($J)";return
unconvert_field($m,$J);}function
dumpOutput(){$J=array('text'=>'open','file'=>'save');if(function_exists('gzencode'))$J['gz']='gzip';return$J;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($k){}function
dumpTable($Q,$Ag,$xd=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Ag)dump_csv(array_keys(fields($Q)));}elseif($Ag){if($xd==2){$n=array();foreach(fields($Q)as$C=>$m)$n[]=idf_escape($C)." $m[full_type]";$xb="CREATE TABLE ".table($Q)." (".implode(", ",$n).")";}else$xb=create_sql($Q,$_POST["auto_increment"]);if($xb){if($Ag=="DROP+CREATE"||$xd==1)echo"DROP ".($xd==2?"VIEW":"TABLE")." IF EXISTS ".table($Q).";\n";if($xd==1)$xb=remove_definer($xb);echo"$xb;\n\n";}}}function
dumpData($Q,$Ag,$H){global$g,$w;$Yd=($w=="sqlite"?0:1048576);if($Ag){if($_POST["format"]=="sql"){if($Ag=="TRUNCATE+INSERT")echo
truncate_sql($Q).";\n";$n=fields($Q);}$I=$g->query($H,1);if($I){$sd="";$Va="";$Dd=array();$Cg="";$Dc=($Q!=''?'fetch_assoc':'fetch_row');while($K=$I->$Dc()){if(!$Dd){$Hh=array();foreach($K
as$X){$m=$I->fetch_field();$Dd[]=$m->name;$x=idf_escape($m->name);$Hh[]="$x = VALUES($x)";}$Cg=($Ag=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Hh):"").";\n";}if($_POST["format"]!="sql"){if($Ag=="table"){dump_csv($Dd);$Ag="INSERT";}dump_csv($K);}else{if(!$sd)$sd="INSERT INTO ".table($Q)." (".implode(", ",array_map('idf_escape',$Dd)).") VALUES";foreach($K
as$x=>$X){$m=$n[$x];$K[$x]=($X!==null?unconvert_field($m,preg_match('~(^|[^o])int|float|double|decimal~',$m["type"])&&$X!=''?$X:q($X)):"NULL");}$bg=($Yd?"\n":" ")."(".implode(",\t",$K).")";if(!$Va)$Va=$sd.$bg;elseif(strlen($Va)+4+strlen($bg)+strlen($Cg)<$Yd)$Va.=",$bg";else{echo$Va.$Cg;$Va=$sd.$bg;}}}if($Va)echo$Va.$Cg;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$g->error)."\n";}}function
dumpFilename($gd){return
friendly_url($gd!=""?$gd:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($gd,$ne=false){$Ve=$_POST["output"];$yc=(preg_match('~sql~',$_POST["format"])?"sql":($ne?"tar":"csv"));header("Content-Type: ".($Ve=="gz"?"application/x-gzip":($yc=="tar"?"application/x-tar":($yc=="sql"||$Ve!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Ve=="gz")ob_start('gzencode',1e6);return$yc;}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.'Alter database'."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?'Alter schema':'Create schema')."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.'Database schema'."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".'Privileges'."</a>\n":"");return
true;}function
navigation($me){global$ia,$w,$Tb;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="http://www.adminer.org/#download" target="_blank" id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($me=="auth"){$Hc=true;foreach((array)$_SESSION["pwds"]as$Jh=>$ng){foreach($ng
as$N=>$Eh){foreach($Eh
as$V=>$G){if($G!==null){if($Hc){echo"<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";$Hc=false;}$Fb=$_SESSION["db"][$Jh][$N][$V];foreach(($Fb?array_keys($Fb):array(""))as$k)echo"<a href='".h(auth_url($Jh,$N,$V,$k))."'>($Tb[$Jh]) ".h($V.($N!=""?"@$N":"").($k!=""?" - $k":""))."</a><br>\n";}}}}}else{$this->databasesPrint($me);if(DB==""||!$me){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".'SQL command'."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".'Import'."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".'Dump'."</a>\n";}if($_GET["ns"]!==""&&!$me&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".'Create table'."</a>\n";$S=table_status('',true);if(!$S)echo"<p class='message'>".'No tables.'."\n";else{$this->tablesPrint($S);$Rd=array();foreach($S
as$Q=>$U)$Rd[]=preg_quote($Q,'/');echo"<script type='text/javascript'>\n","var jushLang = '$w';\n","var jushLinks = { $w: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$Rd).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$w;\n";echo"</script>\n";}}}}function
databasesPrint($me){global$b,$g;$j=$this->databases();echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Db=" onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'";echo"<span title='".'database'."'>DB</span>: ".($j?"<select name='db'$Db>".optionlist(array(""=>"")+$j,DB)."</select>":'<input name="db" value="'.h(DB).'" autocapitalize="off">'),"<input type='submit' value='".'Use'."'".($j?" class='hidden'":"").">\n";if($me!="db"&&DB!=""&&$g->select_db(DB)){if(support("scheme")){echo"<br><select name='ns'$Db>".optionlist(array(""=>"(".'schema'.")")+$b->schemas(),$_GET["ns"])."</select>";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':(isset($_GET["privileges"])?'<input type="hidden" name="privileges" value="">':"")))),"</p></form>\n";}function
tablesPrint($S){echo"<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";foreach($S
as$Q=>$xg){echo'<a href="'.h(ME).'select='.urlencode($Q).'"'.bold($_GET["select"]==$Q||$_GET["edit"]==$Q).">".'select'."</a> ";$C=$this->tableName($xg);echo(support("table")?'<a href="'.h(ME).'table='.urlencode($Q).'"'.bold(in_array($Q,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($xg)?"view":""))." title='".'Show structure'."'>$C</a>":"<span>$C</span>")."<br>\n";}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$He;function
page_header($Zg,$l="",$Ua=array(),$ah=""){global$ca,$ia,$b,$g,$Tb,$w;page_headers();$bh=$Zg.($ah!=""?": $ah":"");$ch=strip_tags($bh.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>',$ch,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=4.0.0",'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=4.0.0",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.0.0",'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.0.0",'">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);" onload="bodyLoad(\'',(is_object($g)?substr($g->server_info,0,3):""),'\');',(isset($_COOKIE["adminer_version"])?"":" verifyVersion('$ia');"),'">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, \' js\');
</script>

<div id="help" class="jush-',$w,' jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
';if($Ua!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$Tb[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$N=(SERVER!=""?h(SERVER):'Server');if($Ua===false)echo"$N\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$N</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ua)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Ua)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Ua
as$x=>$X){$Kb=(is_array($X)?$X[1]:h($X));if($Kb!="")echo"<a href='".h(ME."$x=").urlencode(is_array($X)?$X[0]:$X)."'>$Kb</a> &raquo; ";}}echo"$Zg\n";}}echo"<h2>$bh</h2>\n";restart_session();page_messages($l);$j=&get_session("dbs");if(DB!=""&&$j&&!in_array(DB,$j,true))$j=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}}function
page_messages($l){$_h=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$ie=$_SESSION["messages"][$_h];if($ie){echo"<div class='message'>".implode("</div>\n<div class='message'>",$ie)."</div>\n";unset($_SESSION["messages"][$_h]);}if($l)echo"<div class='error'>$l</div>\n";}function
page_footer($me=""){global$b,$T;echo'</div>

';if($me!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$T,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($me);echo'</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';}function
int32($pe){while($pe>=2147483648)$pe-=4294967296;while($pe<=-2147483649)$pe+=4294967296;return(int)$pe;}function
long2str($W,$Oh){$bg='';foreach($W
as$X)$bg.=pack('V',$X);if($Oh)return
substr($bg,0,end($W));return$bg;}function
str2long($bg,$Oh){$W=array_values(unpack('V*',str_pad($bg,4*ceil(strlen($bg)/4),"\0")));if($Oh)$W[]=strlen($bg);return$W;}function
xxtea_mx($Uh,$Th,$Dg,$_d){return
int32((($Uh>>5&0x7FFFFFF)^$Th<<2)+(($Th>>3&0x1FFFFFFF)^$Uh<<4))^int32(($Dg^$Th)+($_d^$Uh));}function
encrypt_string($zg,$x){if($zg=="")return"";$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($zg,true);$pe=count($W)-1;$Uh=$W[$pe];$Th=$W[0];$Af=floor(6+52/($pe+1));$Dg=0;while($Af-->0){$Dg=int32($Dg+0x9E3779B9);$ac=$Dg>>2&3;for($We=0;$We<$pe;$We++){$Th=$W[$We+1];$oe=xxtea_mx($Uh,$Th,$Dg,$x[$We&3^$ac]);$Uh=int32($W[$We]+$oe);$W[$We]=$Uh;}$Th=$W[0];$oe=xxtea_mx($Uh,$Th,$Dg,$x[$We&3^$ac]);$Uh=int32($W[$pe]+$oe);$W[$pe]=$Uh;}return
long2str($W,false);}function
decrypt_string($zg,$x){if($zg=="")return"";if(!$x)return
false;$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($zg,false);$pe=count($W)-1;$Uh=$W[$pe];$Th=$W[0];$Af=floor(6+52/($pe+1));$Dg=int32($Af*0x9E3779B9);while($Dg){$ac=$Dg>>2&3;for($We=$pe;$We>0;$We--){$Uh=$W[$We-1];$oe=xxtea_mx($Uh,$Th,$Dg,$x[$We&3^$ac]);$Th=int32($W[$We]-$oe);$W[$We]=$Th;}$Uh=$W[$pe];$oe=xxtea_mx($Uh,$Th,$Dg,$x[$We&3^$ac]);$Th=int32($W[0]-$oe);$W[0]=$Th;$Dg=int32($Dg-0x9E3779B9);}return
long2str($W,true);}$g='';$Zc=$_SESSION["token"];if(!$Zc)$_SESSION["token"]=rand(1,1e6);$T=get_token();$if=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($x)=explode(":",$X);$if[$x]=$X;}}$Ia=$_POST["auth"];if($Ia){session_regenerate_id();$Sb=$Ia["driver"];$N=$Ia["server"];$V=$Ia["username"];$G=$Ia["password"];$k=$Ia["db"];set_password($Sb,$N,$V,$G);$_SESSION["db"][$Sb][$N][$V][$k]=true;if($Ia["permanent"]){$x=base64_encode($Sb)."-".base64_encode($N)."-".base64_encode($V)."-".base64_encode($k);$vf=$b->permanentLogin(true);$if[$x]="$x:".base64_encode($vf?encrypt_string($G,$vf):"");cookie("adminer_permanent",implode(" ",$if));}if(count($_POST)==1||DRIVER!=$Sb||SERVER!=$N||$_GET["username"]!==$V||DB!=$k)redirect(auth_url($Sb,$N,$V,$k));}elseif($_POST["logout"]){if($Zc&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$x)set_session($x,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.');}}elseif($if&&!$_SESSION["pwds"]){session_regenerate_id();$vf=$b->permanentLogin();foreach($if
as$x=>$X){list(,$cb)=explode(":",$X);list($Jh,$N,$V,$k)=array_map('base64_decode',explode("-",$x));set_password($Jh,$N,$V,decrypt_string(base64_decode($cb),$vf));$_SESSION["db"][$Jh][$N][$V][$k]=true;}}function
unset_permanent(){global$if;foreach($if
as$x=>$X){list($Jh,$N,$V,$k)=array_map('base64_decode',explode("-",$x));if($Jh==DRIVER&&$N==SERVER&&$V==$_GET["username"]&&$k==DB)unset($if[$x]);}cookie("adminer_permanent",implode(" ",$if));}function
auth_error($sc=null){global$g,$b,$Zc;$og=session_name();$l="";if(!$_COOKIE[$og]&&$_GET[$og]&&ini_bool("session.use_only_cookies"))$l='Session support must be enabled.';elseif(isset($_GET["username"])){if(($_COOKIE[$og]||$_GET[$og])&&!$Zc)$l='Session expired, please login again.';else{$G=get_password();if($G!==null){$l=h($sc?$sc->getMessage():(is_string($g)?$g:'Invalid credentials.'));if($G===false)$l.='<br>'.sprintf('Master password expired. <a href="http://www.adminer.org/en/extension/" target="_blank">Implement</a> %s method to make it permanent.','<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}$F=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$F["lifetime"]);page_header('Login',$l,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");}function
set_password($Jh,$N,$V,$G){$_SESSION["pwds"][$Jh][$N][$V]=($_COOKIE["adminer_key"]?array(encrypt_string($G,$_COOKIE["adminer_key"])):$G);}function
get_password(){$J=get_session("pwds");if(is_array($J))$J=($_COOKIE["adminer_key"]?decrypt_string($J[0],$_COOKIE["adminer_key"]):false);return$J;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$pf)),false);page_footer("auth");exit;}$g=connect();}if(is_string($g)||!$b->login($_GET["username"],get_password())){auth_error();exit;}$Sb=new
Min_Driver($g);if($Ia&&$_POST["token"])$_POST["token"]=$T;$l='';if($_POST){if(!verify_token()){$pd="max_input_vars";$ce=ini_get($pd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$x){$X=ini_get($x);if($X&&(!$ce||$X<$ce)){$pd=$x;$ce=$X;}}}$l=(!$_POST["token"]&&$ce?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$pd'"):'Invalid CSRF token. Send the form again.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$l=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$l.=' '.'You can upload a big SQL file via FTP and import it from server.';}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
connect_error(){global$b,$g,$T,$l,$Tb;$j=array();if(DB!=""){header("HTTP/1.1 404 Not Found");page_header('Database'.": ".h(DB),'Invalid database.',true);}else{if($_POST["db"]&&!$l)queries_redirect(substr(ME,0,-1),'Databases have been dropped.',drop_databases($_POST["db"]));page_header('Select database',$l,false);echo"<p class='links'>\n";foreach(array('database'=>'Create new database','privileges'=>'Privileges','processlist'=>'Process list','variables'=>'Variables','status'=>'Status',)as$x=>$X){if(support($x))echo"<a href='".h(ME)."$x='>$X</a>\n";}echo"<p>".sprintf('%s version: %s through PHP extension %s',$Tb[DRIVER],"<b>$g->server_info</b>","<b>$g->extension</b>")."\n","<p>".sprintf('Logged as: %s',"<b>".h(logged_user())."</b>")."\n";$j=$b->databases();if($j){$eg=support("scheme");$ib=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n","<thead><tr>".(support("database")?"<td>&nbsp;":"")."<th>".'Database'."<td>".'Collation'."<td>".'Tables'."</thead>\n";foreach($j
as$k){$Wf=h(ME)."db=".urlencode($k);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$k,in_array($k,(array)$_POST["db"])):""),"<th><a href='$Wf'>".h($k)."</a>";$d=nbsp(db_collation($k,$ib));echo"<td>".(support("database")?"<a href='$Wf".($eg?"&amp;ns=":"")."&amp;database=' title='".'Alter database'."'>$d</a>":$d),"<td align='right'><a href='$Wf&amp;schema=' id='tables-".h($k)."' title='".'Database schema'."'>?</a>","\n";}echo"</table>\n",(support("database")?"<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value='' onclick=\"selectCount('selected', formChecked(this, /^db/));\">\n"."<input type='submit' name='drop' value='".'Drop'."'".confirm().">\n"."</div></fieldset>\n":""),"<script type='text/javascript'>tableCheck();</script>\n","<input type='hidden' name='token' value='$T'>\n","</form>\n";}echo"<p><a href='".h(ME)."refresh=1'>".'Refresh'."</a>\n";}page_footer("db");if($j)echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=connect');</script>\n";}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header('Schema'.": ".h($_GET["ns"]),'Invalid schema.',true);page_footer("ns");exit;}}function
select($I,$h=null,$Pe=array()){global$w;$Rd=array();$v=array();$f=array();$Ra=array();$rh=array();$J=array();odd('');for($r=0;$K=$I->fetch_row();$r++){if(!$r){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($zd=0;$zd<count($K);$zd++){$m=$I->fetch_field();$C=$m->name;$Oe=$m->orgtable;$Ne=$m->orgname;$J[$m->table]=$Oe;if($Pe&&$w=="sql")$Rd[$zd]=($C=="table"?"table=":($C=="possible_keys"?"indexes=":null));elseif($Oe!=""){if(!isset($v[$Oe])){$v[$Oe]=array();foreach(indexes($Oe,$h)as$u){if($u["type"]=="PRIMARY"){$v[$Oe]=array_flip($u["columns"]);break;}}$f[$Oe]=$v[$Oe];}if(isset($f[$Oe][$Ne])){unset($f[$Oe][$Ne]);$v[$Oe][$Ne]=$zd;$Rd[$zd]=$Oe;}}if($m->charsetnr==63)$Ra[$zd]=true;$rh[$zd]=$m->type;echo"<th".($Oe!=""||$m->name!=$Ne?" title='".h(($Oe!=""?"$Oe.":"").$Ne)."'":"").">".h($C).($Pe?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($C))):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($K
as$x=>$X){if($X===null)$X="<i>NULL</i>";elseif($Ra[$x]&&!is_utf8($X))$X="<i>".lang(array('%d byte','%d bytes'),strlen($X))."</i>";elseif(!strlen($X))$X="&nbsp;";else{$X=h($X);if($rh[$x]==254)$X="<code>$X</code>";}if(isset($Rd[$x])&&!$f[$Rd[$x]]){if($Pe&&$w=="sql"){$Q=$K[array_search("table=",$Rd)];$_=$Rd[$x].urlencode($Pe[$Q]!=""?$Pe[$Q]:$Q);}else{$_="edit=".urlencode($Rd[$x]);foreach($v[$Rd[$x]]as$gb=>$zd)$_.="&where".urlencode("[".bracket_escape($gb)."]")."=".urlencode($K[$zd]);}$X="<a href='".h(ME.$_)."'>$X</a>";}echo"<td>$X";}}echo($r?"</table>":"<p class='message'>".'No rows.')."\n";return$J;}function
referencable_primary($jg){$J=array();foreach(table_status('',true)as$Hg=>$Q){if($Hg!=$jg&&fk_support($Q)){foreach(fields($Hg)as$m){if($m["primary"]){if($J[$Hg]){unset($J[$Hg]);break;}$J[$Hg]=$m;}}}}return$J;}function
textarea($C,$Y,$L=10,$jb=80){global$w;echo"<textarea name='$C' rows='$L' cols='$jb' class='sqlarea jush-$w' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($x,$m,$ib,$Lc=array()){global$_g,$rh,$yh,$De;$U=$m["type"];echo'<td><select name="',$x,'[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);"',on_help("getTarget(event).value",1),'>';if($U&&!isset($rh[$U])&&!isset($Lc[$U]))array_unshift($_g,$U);if($Lc)$_g['Foreign keys']=$Lc;echo
optionlist($_g,$U),'</select>
<td><input name="',$x,'[length]" value="',h($m["length"]),'" size="3" onfocus="editingLengthFocus(this);"',(!$m["length"]&&preg_match('~var(char|binary)$~',$U)?" class='required'":""),' onchange="editingLengthChange(this);" onkeyup="this.onchange();"><td class="options">';echo"<select name='$x"."[collation]'".(preg_match('~(char|text|enum|set)$~',$U)?"":" class='hidden'").'><option value="">('.'collation'.')'.optionlist($ib,$m["collation"]).'</select>',($yh?"<select name='$x"."[unsigned]'".(!$U||preg_match('~((^|[^o])int|float|double|decimal)$~',$U)?"":" class='hidden'").'><option>'.optionlist($yh,$m["unsigned"]).'</select>':''),(isset($m['on_update'])?"<select name='$x"."[on_update]'".($U=="timestamp"?"":" class='hidden'").'>'.optionlist(array(""=>"(".'ON UPDATE'.")","CURRENT_TIMESTAMP"),$m["on_update"]).'</select>':''),($Lc?"<select name='$x"."[on_delete]'".(preg_match("~`~",$U)?"":" class='hidden'")."><option value=''>(".'ON DELETE'.")".optionlist(explode("|",$De),$m["on_delete"])."</select> ":" ");}function
process_length($y){global$lc;return(preg_match("~^\\s*\\(?\\s*$lc(?:\\s*,\\s*$lc)*+\\s*\\)?\\s*\$~",$y)&&preg_match_all("~$lc~",$y,$Wd)?"(".implode(",",$Wd[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$y)));}function
process_type($m,$hb="COLLATE"){global$yh;return" $m[type]".process_length($m["length"]).(preg_match('~(^|[^o])int|float|double|decimal~',$m["type"])&&in_array($m["unsigned"],$yh)?" $m[unsigned]":"").(preg_match('~char|text|enum|set~',$m["type"])&&$m["collation"]?" $hb ".q($m["collation"]):"");}function
process_field($m,$ph){global$w;$Hb=$m["default"];return
array(idf_escape(trim($m["field"])),process_type($ph),($m["null"]?" NULL":" NOT NULL"),(isset($Hb)?" DEFAULT ".((preg_match('~time~',$m["type"])&&preg_match('~^CURRENT_TIMESTAMP$~i',$Hb))||($m["type"]=="bit"&&preg_match("~^([0-9]+|b'[0-1]+')\$~",$Hb))||($w=="pgsql"&&preg_match("~^[a-z]+\\(('[^']*')+\\)\$~",$Hb))?$Hb:q($Hb)):""),($m["type"]=="timestamp"&&$m["on_update"]?" ON UPDATE $m[on_update]":""),(support("comment")&&$m["comment"]!=""?" COMMENT ".q($m["comment"]):""),($m["auto_increment"]?auto_increment():null),);}function
type_class($U){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$x=>$X){if(preg_match("~$x|$X~",$U))return" class='$x'";}}function
edit_fields($n,$ib,$U="TABLE",$Lc=array(),$nb=false){global$g,$qd;echo'<thead><tr class="wrap">
';if($U=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th>',($U=="TABLE"?'Column name':'Parameter name'),'<td>Type<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>Length
<td>Options
';if($U=="TABLE"){echo'<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="Auto Increment">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td>Default values
',(support("comment")?"<td".($nb?"":" class='hidden'").">".'Comment':"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($n))."]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=4.0.0' alt='+' title='".'Add next'."'>",'<script type="text/javascript">row_count = ',count($n),';</script>
</thead>
<tbody onkeydown="return editingKeydown(event);">
';foreach($n
as$r=>$m){$r++;$Qe=$m[($_POST?"orig":"field")];$Pb=(isset($_POST["add"][$r-1])||(isset($m["field"])&&!$_POST["drop_col"][$r]))&&(support("drop_col")||$Qe=="");echo'<tr',($Pb?"":" style='display: none;'"),'>
',($U=="PROCEDURE"?"<td>".html_select("fields[$r][inout]",explode("|",$qd),$m["inout"]):""),'<th>';if($Pb){echo'<input name="fields[',$r,'][field]" value="',h($m["field"]),'" onchange="editingNameChange(this);',($m["field"]!=""||count($n)>1?'':' editingAddRow(this);" onkeyup="if (this.value) editingAddRow(this);'),'" maxlength="64" autocapitalize="off">';}echo'<input type="hidden" name="fields[',$r,'][orig]" value="',h($Qe),'">
';edit_type("fields[$r]",$m,$ib,$Lc);if($U=="TABLE"){echo'<td>',checkbox("fields[$r][null]",1,$m["null"],"","","block"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$r,'"';if($m["auto_increment"]){echo' checked';}?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }"></label><td><?php
echo
checkbox("fields[$r][has_default]",1,$m["has_default"]),'<input name="fields[',$r,'][default]" value="',h($m["default"]),'" onkeyup="keyupChange.call(this);" onchange="this.previousSibling.checked = true;">
',(support("comment")?"<td".($nb?"":" class='hidden'")."><input name='fields[$r][comment]' value='".h($m["comment"])."' maxlength='".($g->server_info>=5.5?1024:255)."'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$r]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=4.0.0' alt='+' title='".'Add next'."' onclick='return !editingAddRow(this, 1);'>&nbsp;"."<input type='image' class='icon' name='up[$r]' src='".h(preg_replace("~\\?.*~","",ME))."?file=up.gif&amp;version=4.0.0' alt='^' title='".'Move up'."'>&nbsp;"."<input type='image' class='icon' name='down[$r]' src='".h(preg_replace("~\\?.*~","",ME))."?file=down.gif&amp;version=4.0.0' alt='v' title='".'Move down'."'>&nbsp;":""),($Qe==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$r]' src='".h(preg_replace("~\\?.*~","",ME))."?file=cross.gif&amp;version=4.0.0' alt='x' title='".'Remove'."' onclick=\"return !editingRemoveRow(this, 'fields\$1[field]');\">":""),"\n";}}function
process_fields(&$n){ksort($n);$D=0;if($_POST["up"]){$Id=0;foreach($n
as$x=>$m){if(key($_POST["up"])==$x){unset($n[$x]);array_splice($n,$Id,0,array($m));break;}if(isset($m["field"]))$Id=$D;$D++;}}elseif($_POST["down"]){$Nc=false;foreach($n
as$x=>$m){if(isset($m["field"])&&$Nc){unset($n[key($_POST["down"])]);array_splice($n,$D,0,array($Nc));break;}if(key($_POST["down"])==$x)$Nc=$m;$D++;}}elseif($_POST["add"]){$n=array_values($n);array_splice($n,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($B){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($B[0][0].$B[0][0],$B[0][0],substr($B[0],1,-1))),'\\'))."'";}function
grant($Tc,$xf,$f,$Ce){if(!$xf)return
true;if($xf==array("ALL PRIVILEGES","GRANT OPTION"))return($Tc=="GRANT"?queries("$Tc ALL PRIVILEGES$Ce WITH GRANT OPTION"):queries("$Tc ALL PRIVILEGES$Ce")&&queries("$Tc GRANT OPTION$Ce"));return
queries("$Tc ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$f, ",$xf).$f).$Ce);}function
drop_create($Ub,$xb,$Vb,$Tg,$Xb,$A,$he,$fe,$ge,$_e,$se){if($_POST["drop"])query_redirect($Ub,$A,$he);elseif($_e=="")query_redirect($xb,$A,$ge);elseif($_e!=$se){$zb=queries($xb);queries_redirect($A,$fe,$zb&&queries($Ub));if($zb)queries($Vb);}else
queries_redirect($A,$fe,queries($Tg)&&queries($Xb)&&queries($Ub)&&queries($xb));}function
create_trigger($Ce,$K){global$w;$Yg=" $K[Timing] $K[Event]";return"CREATE TRIGGER ".idf_escape($K["Trigger"]).($w=="mssql"?$Ce.$Yg:$Yg.$Ce).rtrim(" $K[Type]\n$K[Statement]",";").";";}function
create_routine($Xf,$K){global$qd;$O=array();$n=(array)$K["fields"];ksort($n);foreach($n
as$m){if($m["field"]!="")$O[]=(preg_match("~^($qd)\$~",$m["inout"])?"$m[inout] ":"").idf_escape($m["field"]).process_type($m,"CHARACTER SET");}return"CREATE $Xf ".idf_escape(trim($K["name"]))." (".implode(", ",$O).")".(isset($_GET["function"])?" RETURNS".process_type($K["returns"],"CHARACTER SET"):"").($K["language"]?" LANGUAGE $K[language]":"").rtrim("\n$K[definition]",";").";";}function
remove_definer($H){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\\1)',logged_user()).'`~','\\1',$H);}function
format_foreign_key($o){global$De;return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$o["source"])).") REFERENCES ".table($o["table"])." (".implode(", ",array_map('idf_escape',$o["target"])).")".(preg_match("~^($De)\$~",$o["on_delete"])?" ON DELETE $o[on_delete]":"").(preg_match("~^($De)\$~",$o["on_update"])?" ON UPDATE $o[on_update]":"");}function
tar_file($Fc,$dh){$J=pack("a100a8a8a8a12a12",$Fc,644,0,0,decoct($dh->size),decoct(time()));$ab=8*32;for($r=0;$r<strlen($J);$r++)$ab+=ord($J[$r]);$J.=sprintf("%06o",$ab)."\0 ";echo$J,str_repeat("\0",512-strlen($J));$dh->send();echo
str_repeat("\0",511-($dh->size+511)%512);}function
ini_bytes($pd){$X=ini_get($pd);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($gf){global$w,$g;$Ah=array('sql'=>"http://dev.mysql.com/doc/refman/".substr($g->server_info,0,3)."/en/",'sqlite'=>"http://www.sqlite.org/",'pgsql'=>"http://www.postgresql.org/docs/".substr($g->server_info,0,3)."/static/",'mssql'=>"http://msdn.microsoft.com/library/",'oracle'=>"http://download.oracle.com/docs/cd/B19306_01/server.102/b14200/",);return($gf[$w]?"<a href='$Ah[$w]$gf[$w]' target='_blank' rel='noreferrer'><sup>?</sup></a>":"");}$De="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
TmpFile(){$this->handler=tmpfile();}function
write($sb){$this->size+=strlen($sb);fwrite($this->handler,$sb);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$lc="'(?:''|[^'\\\\]|\\\\.)*+'";$qd="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$n=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));echo$g->result("SELECT".limit(idf_escape($_GET["field"])." FROM ".table($a)," WHERE ".where($_GET,$n),1));exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$n=fields($a);if(!$n)$l=error();$R=table_status1($a,true);page_header(($n&&is_view($R)?'View':'Table').": ".h($a),$l);$b->selectLinks($R);$mb=$R["Comment"];if($mb!="")echo"<p>".'Comment'.": ".h($mb)."\n";if($n){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Column'."<td>".'Type'.(support("comment")?"<td>".'Comment':"")."</thead>\n";foreach($n
as$m){echo"<tr".odd()."><th>".h($m["field"]),"<td title='".h($m["collation"])."'>".h($m["full_type"]).($m["null"]?" <i>NULL</i>":"").($m["auto_increment"]?" <i>".'Auto Increment'."</i>":""),(isset($m["default"])?" [<b>".h($m["default"])."</b>]":""),(support("comment")?"<td>".nbsp($m["comment"]):""),"\n";}echo"</table>\n";if(!is_view($R)){if(support("indexes")){echo"<h3 id='indexes'>".'Indexes'."</h3>\n";$v=indexes($a);if($v){echo"<table cellspacing='0'>\n";foreach($v
as$C=>$u){ksort($u["columns"]);$uf=array();foreach($u["columns"]as$x=>$X)$uf[]="<i>".h($X)."</i>".($u["lengths"][$x]?"(".$u["lengths"][$x].")":"").($u["descs"][$x]?" DESC":"");echo"<tr title='".h($C)."'><th>$u[type]<td>".implode(", ",$uf)."\n";}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.'Alter indexes'."</a>\n";}if(fk_support($R)){echo"<h3 id='foreign-keys'>".'Foreign keys'."</h3>\n";$Lc=foreign_keys($a);if($Lc){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Source'."<td>".'Target'."<td>".'ON DELETE'."<td>".'ON UPDATE'."<td>&nbsp;</thead>\n";foreach($Lc
as$C=>$o){echo"<tr title='".h($C)."'>","<th><i>".implode("</i>, <i>",array_map('h',$o["source"]))."</i>","<td><a href='".h($o["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($o["db"]),ME):($o["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($o["ns"]),ME):ME))."table=".urlencode($o["table"])."'>".($o["db"]!=""?"<b>".h($o["db"])."</b>.":"").($o["ns"]!=""?"<b>".h($o["ns"])."</b>.":"").h($o["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$o["target"]))."</i>)","<td>".nbsp($o["on_delete"])."\n","<td>".nbsp($o["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($C)).'">'.'Alter'.'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.'Add foreign key'."</a>\n";}}if(support(is_view($R)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".'Triggers'."</h3>\n";$oh=triggers($a);if($oh){echo"<table cellspacing='0'>\n";foreach($oh
as$x=>$X)echo"<tr valign='top'><td>$X[0]<td>$X[1]<th>".h($x)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($x))."'>".'Alter'."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.'Add trigger'."</a>\n";}}}elseif(isset($_GET["schema"])){page_header('Database schema',"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Jg=array();$Kg=array();$C="adminer_schema";$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE[($_COOKIE["$C-".DB]?"$C-".DB:$C)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$Wd,PREG_SET_ORDER);foreach($Wd
as$r=>$B){$Jg[$B[1]]=array($B[2],$B[3]);$Kg[]="\n\t'".js_escape($B[1])."': [ $B[2], $B[3] ]";}$fh=0;$Oa=-1;$dg=array();$Lf=array();$Md=array();foreach(table_status('',true)as$Q=>$R){if(is_view($R))continue;$mf=0;$dg[$Q]["fields"]=array();foreach(fields($Q)as$C=>$m){$mf+=1.25;$m["pos"]=$mf;$dg[$Q]["fields"][$C]=$m;}$dg[$Q]["pos"]=($Jg[$Q]?$Jg[$Q]:array($fh,0));foreach($b->foreignKeys($Q)as$X){if(!$X["db"]){$Kd=$Oa;if($Jg[$Q][1]||$Jg[$X["table"]][1])$Kd=min(floatval($Jg[$Q][1]),floatval($Jg[$X["table"]][1]))-1;else$Oa-=.1;while($Md[(string)$Kd])$Kd-=.0001;$dg[$Q]["references"][$X["table"]][(string)$Kd]=array($X["source"],$X["target"]);$Lf[$X["table"]][$Q][(string)$Kd]=$X["target"];$Md[(string)$Kd]=true;}}$fh=max($fh,$dg[$Q]["pos"][0]+2.5+$mf);}echo'<div id="schema" style="height: ',$fh,'em;" onselectstart="return false;">
<script type="text/javascript">
var tablePos = {',implode(",",$Kg)."\n",'};
var em = document.getElementById(\'schema\').offsetHeight / ',$fh,';
document.onmousemove = schemaMousemove;
document.onmouseup = function (ev) {
	schemaMouseup(ev, \'',js_escape(DB),'\');
};
</script>
';foreach($dg
as$C=>$Q){echo"<div class='table' style='top: ".$Q["pos"][0]."em; left: ".$Q["pos"][1]."em;' onmousedown='schemaMousedown(this, event);'>",'<a href="'.h(ME).'table='.urlencode($C).'"><b>'.h($C)."</b></a>";foreach($Q["fields"]as$m){$X='<span'.type_class($m["type"]).' title="'.h($m["full_type"].($m["null"]?" NULL":'')).'">'.h($m["field"]).'</span>';echo"<br>".($m["primary"]?"<i>$X</i>":$X);}foreach((array)$Q["references"]as$Qg=>$Mf){foreach($Mf
as$Kd=>$If){$Ld=$Kd-$Jg[$C][1];$r=0;foreach($If[0]as$sg)echo"\n<div class='references' title='".h($Qg)."' id='refs$Kd-".($r++)."' style='left: $Ld"."em; top: ".$Q["fields"][$sg]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$Ld)."em;'></div></div>";}}foreach((array)$Lf[$C]as$Qg=>$Mf){foreach($Mf
as$Kd=>$f){$Ld=$Kd-$Jg[$C][1];$r=0;foreach($f
as$Pg)echo"\n<div class='references' title='".h($Qg)."' id='refd$Kd-".($r++)."' style='left: $Ld"."em; top: ".$Q["fields"][$Pg]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME))."?file=arrow.gif) no-repeat right center;&amp;version=4.0.0'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$Ld)."em;'></div></div>";}}echo"\n</div>\n";}foreach($dg
as$C=>$Q){foreach((array)$Q["references"]as$Qg=>$Mf){foreach($Mf
as$Kd=>$If){$le=$fh;$ae=-10;foreach($If[0]as$x=>$sg){$nf=$Q["pos"][0]+$Q["fields"][$sg]["pos"];$of=$dg[$Qg]["pos"][0]+$dg[$Qg]["fields"][$If[1][$x]]["pos"];$le=min($le,$nf,$of);$ae=max($ae,$nf,$of);}echo"<div class='references' id='refl$Kd' style='left: $Kd"."em; top: $le"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($ae-$le)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">Permanent link</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$l){$vb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$x)$vb.="&$x=".urlencode($_POST[$x]);cookie("adminer_export",substr($vb,1));$S=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$yc=dump_headers((count($S)==1?key($S):DB),(DB==""||count($S)>1));$vd=preg_match('~sql~',$_POST["format"]);if($vd)echo"-- Adminer $ia ".$Tb[DRIVER]." dump

".($w!="sql"?"":"SET NAMES utf8;
".($_POST["data_style"]?"SET foreign_key_checks = 0;
SET time_zone = ".q(substr(preg_replace('~^[^-]~','+\0',$g->result("SELECT TIMEDIFF(NOW(), UTC_TIMESTAMP)")),0,6)).";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
");$Ag=$_POST["db_style"];$j=array(DB);if(DB==""){$j=$_POST["databases"];if(is_string($j))$j=explode("\n",rtrim(str_replace("\r","",$j),"\n"));}foreach((array)$j
as$k){$b->dumpDatabase($k);if($g->select_db($k)){if($vd&&preg_match('~CREATE~',$Ag)&&($xb=$g->result("SHOW CREATE DATABASE ".idf_escape($k),1))){if($Ag=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($k).";\n";echo"$xb;\n";}if($vd){if($Ag)echo
use_sql($k).";\n\n";$Ue="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Xf){foreach(get_rows("SHOW $Xf STATUS WHERE Db = ".q($k),null,"-- ")as$K)$Ue.=($Ag!='DROP+CREATE'?"DROP $Xf IF EXISTS ".idf_escape($K["Name"]).";;\n":"").remove_definer($g->result("SHOW CREATE $Xf ".idf_escape($K["Name"]),2)).";;\n\n";}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$K)$Ue.=($Ag!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($K["Name"]).";;\n":"").remove_definer($g->result("SHOW CREATE EVENT ".idf_escape($K["Name"]),3)).";;\n\n";}if($Ue)echo"DELIMITER ;;\n\n$Ue"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$Mh=array();foreach(table_status('',true)as$C=>$R){$Q=(DB==""||in_array($C,(array)$_POST["tables"]));$Ab=(DB==""||in_array($C,(array)$_POST["data"]));if($Q||$Ab){if($yc=="tar"){$dh=new
TmpFile;ob_start(array($dh,'write'),1e5);}$b->dumpTable($C,($Q?$_POST["table_style"]:""),(is_view($R)?2:0));if(is_view($R))$Mh[]=$C;elseif($Ab){$n=fields($C);$b->dumpData($C,$_POST["data_style"],"SELECT *".convert_fields($n,$n)." FROM ".table($C));}if($vd&&$_POST["triggers"]&&$Q&&($oh=trigger_sql($C,$_POST["table_style"])))echo"\nDELIMITER ;;\n$oh\nDELIMITER ;\n";if($yc=="tar"){ob_end_flush();tar_file((DB!=""?"":"$k/")."$C.csv",$dh);}elseif($vd)echo"\n";}}foreach($Mh
as$Lh)$b->dumpTable($Lh,$_POST["table_style"],1);if($yc=="tar")echo
pack("x512");}}}if($vd)echo"-- ".$g->result("SELECT NOW()")."\n";exit;}page_header('Export',$l,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0">
';$Eb=array('','USE','DROP+CREATE','CREATE');$Lg=array('','DROP+CREATE','CREATE');$Bb=array('','TRUNCATE+INSERT','INSERT');if($w=="sql")$Bb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$K);if(!$K)$K=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($K["events"])){$K["routines"]=$K["events"]=($_GET["dump"]=="");$K["triggers"]=$K["table_style"];}echo"<tr><th>".'Output'."<td>".html_select("output",$b->dumpOutput(),$K["output"],0)."\n";echo"<tr><th>".'Format'."<td>".html_select("format",$b->dumpFormat(),$K["format"],0)."\n";echo($w=="sqlite"?"":"<tr><th>".'Database'."<td>".html_select('db_style',$Eb,$K["db_style"]).(support("routine")?checkbox("routines",1,$K["routines"],'Routines'):"").(support("event")?checkbox("events",1,$K["events"],'Events'):"")),"<tr><th>".'Tables'."<td>".html_select('table_style',$Lg,$K["table_style"]).checkbox("auto_increment",1,$K["auto_increment"],'Auto Increment').(support("trigger")?checkbox("triggers",1,$K["triggers"],'Triggers'):""),"<tr><th>".'Data'."<td>".html_select('data_style',$Bb,$K["data_style"]),'</table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="',$T,'">

<table cellspacing="0">
';$rf=array();if(DB!=""){$Za=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$Za onclick='formCheck(this, /^tables\\[/);'>".'Tables'."</label>","<th style='text-align: right;'><label class='block'>".'Data'."<input type='checkbox' id='check-data'$Za onclick='formCheck(this, /^data\\[/);'></label>","</thead>\n";$Mh="";$Mg=tables_list();foreach($Mg
as$C=>$U){$qf=preg_replace('~_.*~','',$C);$Za=($a==""||$a==(substr($a,-1)=="%"?"$qf%":$C));$uf="<tr><td>".checkbox("tables[]",$C,$Za,$C,"checkboxClick(event, this); formUncheck('check-tables');","block");if($U!==null&&!preg_match('~table~i',$U))$Mh.="$uf\n";else
echo"$uf<td align='right'><label class='block'><span id='Rows-".h($C)."'></span>".checkbox("data[]",$C,$Za,"","checkboxClick(event, this); formUncheck('check-data');")."</label>\n";$rf[$qf]++;}echo$Mh;if($Mg)echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=db');</script>\n";}else{echo"<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"")." onclick='formCheck(this, /^databases\\[/);'>".'Database'."</label></thead>\n";$j=$b->databases();if($j){foreach($j
as$k){if(!information_schema($k)){$qf=preg_replace('~_.*~','',$k);echo"<tr><td>".checkbox("databases[]",$k,$a==""||$a=="$qf%",$k,"formUncheck('check-databases');","block")."\n";$rf[$qf]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$Hc=true;foreach($rf
as$x=>$X){if($x!=""&&$X>1){echo($Hc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$x%")."'>".h($x)."</a>";$Hc=false;}}}elseif(isset($_GET["privileges"])){page_header('Privileges');$I=$g->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$Tc=$I;if(!$I)$I=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($Tc?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".'Username'."<th>".'Server'."<th>&nbsp;</thead>\n";while($K=$I->fetch_assoc())echo'<tr'.odd().'><td>'.h($K["User"])."<td>".h($K["Host"]).'<td><a href="'.h(ME.'user='.urlencode($K["User"]).'&host='.urlencode($K["Host"])).'">'.'Edit'."</a>\n";if(!$Tc||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".'Edit'."'>\n";echo"</table>\n","</form>\n",'<p class="links"><a href="'.h(ME).'user=">'.'Create user'."</a>";}elseif(isset($_GET["sql"])){if(!$l&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$bd=&get_session("queries");$ad=&$bd[DB];if(!$l&&$_POST["clear"]){$ad=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?'Import':'SQL command'),$l);if(!$l&&$_POST){$Pc=false;if(!isset($_GET["import"]))$H=$_POST["query"];elseif($_POST["webfile"]){$Pc=@fopen((file_exists("adminer.sql")?"adminer.sql":"compress.zlib://adminer.sql.gz"),"rb");$H=($Pc?fread($Pc,1e6):false);}else$H=get_file("sql_file",true);if(is_string($H)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($H)+memory_get_usage()+8e6));if($H!=""&&strlen($H)<1e6){$Af=$H.(preg_match("~;[ \t\r\n]*\$~",$H)?"":";");if(!$ad||reset(end($ad))!=$Af){restart_session();$ad[]=array($Af,time());set_session("queries",$bd);stop_session();}}$tg="(?:\\s|/\\*.*\\*/|(?:#|-- )[^\n]*\n|--\n)";$Jb=";";$D=0;$hc=true;$h=connect();if(is_object($h)&&DB!="")$h->select_db(DB);$lb=0;$nc=array();$Qd=0;$Ze='[\'"'.($w=="sql"?'`#':($w=="sqlite"?'`[':($w=="mssql"?'[':''))).']|/\\*|-- |$'.($w=="pgsql"?'|\\$[^$]*\\$':'');$gh=microtime(true);parse_str($_COOKIE["adminer_export"],$va);$Zb=$b->dumpFormat();unset($Zb["sql"]);while($H!=""){if(!$D&&preg_match("~^$tg*DELIMITER\\s+(\\S+)~i",$H,$B)){$Jb=$B[1];$H=substr($H,strlen($B[0]));}else{preg_match('('.preg_quote($Jb)."\\s*|$Ze)",$H,$B,PREG_OFFSET_CAPTURE,$D);list($Nc,$mf)=$B[0];if(!$Nc&&$Pc&&!feof($Pc))$H.=fread($Pc,1e5);else{if(!$Nc&&rtrim($H)=="")break;$D=$mf+strlen($Nc);if($Nc&&rtrim($Nc)!=$Jb){while(preg_match('('.($Nc=='/*'?'\\*/':($Nc=='['?']':(preg_match('~^-- |^#~',$Nc)?"\n":preg_quote($Nc)."|\\\\."))).'|$)s',$H,$B,PREG_OFFSET_CAPTURE,$D)){$bg=$B[0][0];if(!$bg&&$Pc&&!feof($Pc))$H.=fread($Pc,1e5);else{$D=$B[0][1]+strlen($bg);if($bg[0]!="\\")break;}}}else{$hc=false;$Af=substr($H,0,$mf);$lb++;$uf="<pre id='sql-$lb'><code class='jush-$w'>".shorten_utf8(trim($Af),1000)."</code></pre>\n";if(!$_POST["only_errors"]){echo$uf;ob_flush();flush();}$wg=microtime(true);if($g->multi_query($Af)&&is_object($h)&&preg_match("~^$tg*USE\\b~isU",$Af))$h->query($Af);do{$I=$g->store_result();$ic=microtime(true);$Wg=" <span class='time'>(".format_time($wg,$ic).")</span>".(strlen($Af)<1000?" <a href='".h(ME)."sql=".urlencode(trim($Af))."'>".'Edit'."</a>":"");if($g->error){echo($_POST["only_errors"]?$uf:""),"<p class='error'>".'Error in query'.($g->errno?" ($g->errno)":"").": ".error()."\n";$nc[]=" <a href='#sql-$lb'>$lb</a>";if($_POST["error_stops"])break
2;}elseif(is_object($I)){$Pe=select($I,$h);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n","<p>".($I->num_rows?lang(array('%d row','%d rows'),$I->num_rows):"").$Wg;$s="export-$lb";$xc=", <a href='#$s' onclick=\"return !toggle('$s');\">".'Export'."</a><span id='$s' class='hidden'>: ".html_select("output",$b->dumpOutput(),$va["output"])." ".html_select("format",$Zb,$va["format"])."<input type='hidden' name='query' value='".h($Af)."'>"." <input type='submit' name='export' value='".'Export'."'><input type='hidden' name='token' value='$T'></span>\n";if($h&&preg_match("~^($tg|\\()*SELECT\\b~isU",$Af)&&($wc=explain($h,$Af))){$s="explain-$lb";echo", <a href='#$s' onclick=\"return !toggle('$s');\">EXPLAIN</a>$xc","<div id='$s' class='hidden'>\n";select($wc,$h,$Pe);echo"</div>\n";}else
echo$xc;echo"</form>\n";}}else{if(preg_match("~^$tg*(CREATE|DROP|ALTER)$tg+(DATABASE|SCHEMA)\\b~isU",$Af)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($g->info)."'>".lang(array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),$g->affected_rows)."$Wg\n";}$wg=$ic;}while($g->next_result());$Qd+=substr_count($Af.$Nc,"\n");$H=substr($H,$D);$D=0;}}}}if($hc)echo"<p class='message'>".'No commands to execute.'."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(array('%d query executed OK.','%d queries executed OK.'),$lb-count($nc))," <span class='time'>(".format_time($gh,microtime(true)).")</span>\n";}elseif($nc&&$lb>1)echo"<p class='error'>".'Error in query'.": ".implode("",$nc)."\n";}else
echo"<p class='error'>".upload_error($H)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$tc="<input type='submit' value='".'Execute'."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$Af=$_GET["sql"];if($_POST)$Af=$_POST["query"];elseif($_GET["history"]=="all")$Af=$ad;elseif($_GET["history"]!="")$Af=$ad[$_GET["history"]][0];echo"<p>";textarea("query",$Af,20);echo($_POST?"":"<script type='text/javascript'>focus(document.getElementsByTagName('textarea')[0]);</script>\n"),"<p>$tc\n";}else{echo"<fieldset><legend>".'File upload'."</legend><div>",(ini_bool("file_uploads")?'<input type="file" name="sql_file[]" multiple> (&lt; '.ini_get("upload_max_filesize").'B)':'File uploads are disabled.'),"\n$tc","</div></fieldset>\n","<fieldset><legend>".'From server'."</legend><div>",sprintf('Webserver file %s',"<code>adminer.sql".(extension_loaded("zlib")?"[.gz]":"")."</code>"),' <input type="submit" name="webfile" value="'.'Run file'.'">',"</div></fieldset>\n","<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])),'Stop on error')."\n",checkbox("only_errors",1,$_POST["only_errors"],'Show only errors')."\n","<input type='hidden' name='token' value='$T'>\n";if(!isset($_GET["import"])&&$ad){print_fieldset("history",'History',$_GET["history"]!="");for($X=end($ad);$X;$X=prev($ad)){$x=key($ad);list($Af,$Wg)=$X;echo'<a href="'.h(ME."sql=&history=$x").'">'.'Edit'."</a> <span class='time' title='".@date('Y-m-d',$Wg)."'>".@date("H:i:s",$Wg)."</span> <code class='jush-$w'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$Af)))),80,"</code>")."<br>\n";}echo"<input type='submit' name='clear' value='".'Clear'."'>\n","<a href='".h(ME."sql=&history=all")."'>".'Edit all'."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$n=fields($a);$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0],$n):""):where($_GET,$n));$zh=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($n
as$C=>$m){if(!isset($m["privileges"][$zh?"update":"insert"])||$b->fieldName($m)=="")unset($n[$C]);}if($_POST&&!$l&&!isset($_GET["select"])){$A=$_POST["referer"];if($_POST["insert"])$A=($zh?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$A))$A=ME."select=".urlencode($a);$v=indexes($a);$uh=unique_array($_GET["where"],$v);$Df="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($A,'Item has been deleted.',$Sb->delete($a,$Df,!$uh));else{$O=array();foreach($n
as$C=>$m){$X=process_input($m);if($X!==false&&$X!==null)$O[idf_escape($C)]=$X;}if($zh){if(!$O)redirect($A);queries_redirect($A,'Item has been updated.',$Sb->update($a,$O,$Df,!$uh));if(is_ajax()){page_headers();page_messages($l);exit;}}else{$I=$Sb->insert($a,$O);$Jd=($I?last_id():0);queries_redirect($A,sprintf('Item%s has been inserted.',($Jd?" $Jd":"")),$I);}}}$Hg=$b->tableName(table_status1($a,true));page_header(($zh?'Edit':'Insert'),$l,array("select"=>array($a,$Hg)),$Hg);$K=null;if($_POST["save"])$K=(array)$_POST["fields"];elseif($Z){$M=array();foreach($n
as$C=>$m){if(isset($m["privileges"]["select"])){$Ea=convert_field($m);if($_POST["clone"]&&$m["auto_increment"])$Ea="''";if($w=="sql"&&preg_match("~enum|set~",$m["type"]))$Ea="1*".idf_escape($C);$M[]=($Ea?"$Ea AS ":"").idf_escape($C);}}$K=array();if(!support("table"))$M=array("*");if($M){$I=$Sb->select($a,$M,array($Z),$M,array(),(isset($_GET["select"])?2:1),0);$K=$I->fetch_assoc();if(isset($_GET["select"])&&(!$K||$I->fetch_assoc()))$K=null;}}if(!support("table")&&!$n){if(!$Z){$K=reset(get_rows("SELECT * FROM ".table($a)." LIMIT 1"));if(!$K)$K=array("itemName()"=>"");}if($K){foreach($K
as$x=>$X){if(!$Z)$K[$x]=null;$n[$x]=array("field"=>$x,"null"=>($x!="itemName()"),"auto_increment"=>($x=="itemName()"));}}}if($K===false)echo"<p class='error'>".'No rows.'."\n";echo'
<div id="message"></div>

<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$n)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($n
as$C=>$m){echo"<tr><th>".$b->fieldName($m);$Hb=$_GET["set"][bracket_escape($C)];if($Hb===null){$Hb=$m["default"];if($m["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Hb,$Nf))$Hb=$Nf[1];}$Y=($K!==null?($K[$C]!=""&&$w=="sql"&&preg_match("~enum|set~",$m["type"])?(is_array($K[$C])?array_sum($K[$C]):+$K[$C]):$K[$C]):(!$zh&&$m["auto_increment"]?"":(isset($_GET["select"])?false:$Hb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$m);$p=($_POST["save"]?(string)$_POST["function"][$C]:($zh&&$m["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$m["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$p="now";}input($m,$Y,$p);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]' value='".h($_POST["field_keys"][0])."'>"."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array()),$_POST["field_funs"][0])."<td><input name='field_vals[]' value='".h($_POST["field_vals"][0])."'>"."\n";echo"</table>\n";}echo'<p>
';if($n){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"]))echo"<input type='submit' name='insert' value='".($zh?'Save and continue edit'."' onclick='return !ajaxForm(this.form, \"".'Saving'.'...", this)':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n";}echo($zh?"<input type='submit' name='delete' value='".'Delete'."'".confirm().">\n":($_POST||!$n?"":"<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["create"])){$a=$_GET["create"];$af=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$x)$af[$x]=$x;$Kf=referencable_primary($a);$Lc=array();foreach($Kf
as$Hg=>$m)$Lc[str_replace("`","``",$Hg)."`".str_replace("`","``",$m["field"])]=$Hg;$Se=array();$R=array();if($a!=""){$Se=fields($a);$R=table_status($a);if(!$R)$l='No tables.';}$K=$_POST;$K["fields"]=(array)$K["fields"];if($K["auto_increment_col"])$K["fields"][$K["auto_increment_col"]]["auto_increment"]=true;if($_POST&&!process_fields($K["fields"])&&!$l){if($_POST["drop"])queries_redirect(substr(ME,0,-1),'Table has been dropped.',drop_tables(array($a)));else{$n=array();$Ba=array();$Bh=false;$Jc=array();ksort($K["fields"]);$Re=reset($Se);$za=" FIRST";foreach($K["fields"]as$x=>$m){$o=$Lc[$m["type"]];$ph=($o!==null?$Kf[$o]:$m);if($m["field"]!=""){if(!$m["has_default"])$m["default"]=null;if($x==$K["auto_increment_col"])$m["auto_increment"]=true;$zf=process_field($m,$ph);$Ba[]=array($m["orig"],$zf,$za);if($zf!=process_field($Re,$Re)){$n[]=array($m["orig"],$zf,$za);if($m["orig"]!=""||$za)$Bh=true;}if($o!==null)$Jc[idf_escape($m["field"])]=($a!=""&&$w!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$Lc[$m["type"]],'source'=>array($m["field"]),'target'=>array($ph["field"]),'on_delete'=>$m["on_delete"],));$za=" AFTER ".idf_escape($m["field"]);}elseif($m["orig"]!=""){$Bh=true;$n[]=array($m["orig"]);}if($m["orig"]!=""){$Re=next($Se);if(!$Re)$za="";}}$cf="";if($af[$K["partition_by"]]){$df=array();if($K["partition_by"]=='RANGE'||$K["partition_by"]=='LIST'){foreach(array_filter($K["partition_names"])as$x=>$X){$Y=$K["partition_values"][$x];$df[]="\n  PARTITION ".idf_escape($X)." VALUES ".($K["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$cf.="\nPARTITION BY $K[partition_by]($K[partition])".($df?" (".implode(",",$df)."\n)":($K["partitions"]?" PARTITIONS ".(+$K["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$R["Create_options"]))$cf.="\nREMOVE PARTITIONING";$ee='Table has been altered.';if($a==""){cookie("adminer_engine",$K["Engine"]);$ee='Table has been created.';}$C=trim($K["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($C),$ee,alter_table($a,$C,($w=="sqlite"&&($Bh||$Jc)?$Ba:$n),$Jc,$K["Comment"],($K["Engine"]&&$K["Engine"]!=$R["Engine"]?$K["Engine"]:""),($K["Collation"]&&$K["Collation"]!=$R["Collation"]?$K["Collation"]:""),($K["Auto_increment"]!=""?+$K["Auto_increment"]:""),$cf));}}page_header(($a!=""?'Alter table':'Create table'),$l,array("table"=>$a),h($a));if(!$_POST){$K=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($rh["int"])?"int":(isset($rh["integer"])?"integer":"")))),"partition_names"=>array(""),);if($a!=""){$K=$R;$K["name"]=$a;$K["fields"]=array();if(!$_GET["auto_increment"])$K["Auto_increment"]="";foreach($Se
as$m){$m["has_default"]=isset($m["default"]);$K["fields"][]=$m;}if(support("partitioning")){$Qc="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$I=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $Qc ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($K["partition_by"],$K["partitions"],$K["partition"])=$I->fetch_row();$df=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $Qc AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$df[""]="";$K["partition_names"]=array_keys($df);$K["partition_values"]=array_values($df);}}}$ib=collations();$kc=engines();foreach($kc
as$jc){if(!strcasecmp($jc,$K["Engine"])){$K["Engine"]=$jc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo'Table name: <input name="name" maxlength="64" value="',h($K["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST){?><script type='text/javascript'>focus(document.getElementById('form')['name']);</script><?php }echo($kc?"<select name='Engine' onchange='helpClose();'".on_help("getTarget(event).value",1).">".optionlist(array(""=>"(".'engine'.")")+$kc,$K["Engine"])."</select>":""),' ',($ib&&!preg_match("~sqlite|mssql~",$w)?html_select("Collation",array(""=>"(".'collation'.")")+$ib,$K["Collation"]):""),' <input type="submit" value="Save">
';}echo'
';if(support("columns")){echo'<table cellspacing="0" id="edit-fields" class="nowrap">
';$nb=($_POST?$_POST["comments"]:$K["Comment"]!="");if(!$_POST&&!$nb){foreach($K["fields"]as$m){if($m["comment"]!=""){$nb=true;break;}}}edit_fields($K["fields"],$ib,"TABLE",$Lc,$nb);echo'</table>
<p>
Auto Increment: <input type="number" name="Auto_increment" size="6" value="',h($K["Auto_increment"]),'">
',checkbox("defaults",1,true,'Default values',"columnShow(this.checked, 5)","jsonly");if(!$_POST["defaults"]){echo'<script type="text/javascript">editingHideDefaults()</script>';}echo(support("comment")?"<label><input type='checkbox' name='comments' value='1' class='jsonly' onclick=\"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();\"".($nb?" checked":"").">".'Comment'."</label>".' <input name="Comment" id="Comment" value="'.h($K["Comment"]).'" maxlength="'.($g->server_info>=5.5?2048:60).'"'.($nb?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="Save">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}if(support("partitioning")){$bf=preg_match('~RANGE|LIST~',$K["partition_by"]);print_fieldset("partition",'Partition by',$K["partition_by"]);echo'<p>
',"<select name='partition_by' onchange='partitionByChange(this);'".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).">".optionlist(array(""=>"")+$af,$K["partition_by"])."</select>",'(<input name="partition" value="',h($K["partition"]),'">)
Partitions: <input type="number" name="partitions" class="size',($bf||!$K["partition_by"]?" hidden":""),'" value="',h($K["partitions"]),'">
<table cellspacing="0" id="partition-table"',($bf?"":" class='hidden'"),'>
<thead><tr><th>Partition name<th>Values</thead>
';foreach($K["partition_names"]as$x=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'"'.($x==count($K["partition_names"])-1?' onchange="partitionNameChange(this);"':'').' autocapitalize="off">','<td><input name="partition_values[]" value="'.h($K["partition_values"][$x]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$ld=array("PRIMARY","UNIQUE","INDEX");$R=table_status($a,true);if(preg_match('~MyISAM|M?aria'.($g->server_info>=5.6?'|InnoDB':'').'~i',$R["Engine"]))$ld[]="FULLTEXT";$v=indexes($a);$sf=array();if($w=="mongo"){$sf=$v["_id_"];unset($ld[0]);unset($v["_id_"]);}$K=$_POST;if($_POST&&!$l&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($K["indexes"]as$u){$C=$u["name"];if(in_array($u["type"],$ld)){$f=array();$Od=array();$Lb=array();$O=array();ksort($u["columns"]);foreach($u["columns"]as$x=>$e){if($e!=""){$y=$u["lengths"][$x];$Kb=$u["descs"][$x];$O[]=idf_escape($e).($y?"(".(+$y).")":"").($Kb?" DESC":"");$f[]=$e;$Od[]=($y?$y:null);$Lb[]=$Kb;}}if($f){$uc=$v[$C];if($uc){ksort($uc["columns"]);ksort($uc["lengths"]);ksort($uc["descs"]);if($u["type"]==$uc["type"]&&array_values($uc["columns"])===$f&&(!$uc["lengths"]||array_values($uc["lengths"])===$Od)&&array_values($uc["descs"])===$Lb){unset($v[$C]);continue;}}$c[]=array($u["type"],$C,"(".implode(", ",$O).")");}}}foreach($v
as$C=>$uc)$c[]=array($uc["type"],$C,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),'Indexes have been altered.',alter_indexes($a,$c));}page_header('Indexes',$l,array("table"=>$a),h($a));$n=array_keys(fields($a));if($_POST["add"]){foreach($K["indexes"]as$x=>$u){if($u["columns"][count($u["columns"])]!="")$K["indexes"][$x]["columns"][]="";}$u=end($K["indexes"]);if($u["type"]||array_filter($u["columns"],'strlen'))$K["indexes"][]=array("columns"=>array(1=>""));}if(!$K){foreach($v
as$x=>$u){$v[$x]["name"]=$x;$v[$x]["columns"][]="";}$v[]=array("columns"=>array(1=>""));$K["indexes"]=$v;}?>

<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th>Index Type
<th><input type="submit" style="left: -1000px; position: absolute;">Column (length)
<th>Name
<th><noscript><input type='image' class='icon' name='add[0]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=4.0.0' alt='+' title='Add next'></noscript>&nbsp;
</thead>
<?php
if($sf){echo"<tr><td>PRIMARY<td>";foreach($sf["columns"]as$x=>$e){echo"<select disabled>".optionlist($n,$e)."</select>","<label><input disabled type='checkbox'>".'descending'."</label> ";}echo"<td><td>\n";}$zd=1;foreach($K["indexes"]as$u){if(!$_POST["drop_col"]||$zd!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$zd][type]",array(-1=>"")+$ld,$u["type"],($zd==count($K["indexes"])?"indexesAddRow(this);":1)),"<td>";ksort($u["columns"]);$r=1;foreach($u["columns"]as$x=>$e){echo"<span>".html_select("indexes[$zd][columns][$r]",array(-1=>"")+$n,$e,($r==count($u["columns"])?"indexesAddColumn":"indexesChangeColumn")."(this, '".js_escape($w=="sql"?"":$_GET["indexes"]."_")."');"),($w=="sql"||$w=="mssql"?"<input type='number' name='indexes[$zd][lengths][$r]' class='size' value='".h($u["lengths"][$x])."'>":""),($w!="sql"?checkbox("indexes[$zd][descs][$r]",1,$u["descs"][$x],'descending'):"")," </span>";$r++;}echo"<td><input name='indexes[$zd][name]' value='".h($u["name"])."' autocapitalize='off'>\n","<td><input type='image' class='icon' name='drop_col[$zd]' src='".h(preg_replace("~\\?.*~","",ME))."?file=cross.gif&amp;version=4.0.0' alt='x' title='".'Remove'."' onclick=\"return !editingRemoveRow(this, 'indexes\$1[type]');\">\n";}$zd++;}echo'</table>
<p>
<input type="submit" value="Save">
<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["database"])){$K=$_POST;if($_POST&&!$l&&!isset($_POST["add_x"])){restart_session();$C=trim($K["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'Database has been dropped.',drop_databases(array(DB)));}elseif(DB!==$C){if(DB!=""){$_GET["db"]=$C;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($C),'Database has been renamed.',rename_database($C,$K["collation"]));}else{$j=explode("\n",str_replace("\r","",$C));$Bg=true;$Id="";foreach($j
as$k){if(count($j)==1||$k!=""){if(!create_database($k,$K["collation"]))$Bg=false;$Id=$k;}}queries_redirect(ME."db=".urlencode($Id),'Database has been created.',$Bg);}}else{if(!$K["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($C).(preg_match('~^[a-z0-9_]+$~i',$K["collation"])?" COLLATE $K[collation]":""),substr(ME,0,-1),'Database has been altered.');}}page_header(DB!=""?'Alter database':'Create database',$l,array(),h(DB));$ib=collations();$C=DB;if($_POST)$C=$K["name"];elseif(DB!="")$K["collation"]=db_collation(DB,$ib);elseif($w=="sql"){foreach(get_vals("SHOW GRANTS")as$Tc){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$Tc,$B)&&$B[1]){$C=stripcslashes(idf_unescape("`$B[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($C,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($C).'</textarea><br>':'<input name="name" id="name" value="'.h($C).'" maxlength="64" autocapitalize="off">')."\n".($ib?html_select("collation",array(""=>"(".'collation'.")")+$ib,$K["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mssql'=>"ms187963.aspx",)):"");?>
<script type='text/javascript'>focus(document.getElementById('name'));</script>
<input type="submit" value="Save">
<?php
if(DB!="")echo"<input type='submit' name='drop' value='".'Drop'."'".confirm().">\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=4.0.0' alt='+' title='".'Add next'."'>\n";echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["scheme"])){$K=$_POST;if($_POST&&!$l){$_=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$_,'Schema has been dropped.');else{$C=trim($K["name"]);$_.=urlencode($C);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($C),$_,'Schema has been created.');elseif($_GET["ns"]!=$C)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($C),$_,'Schema has been altered.');else
redirect($_);}}page_header($_GET["ns"]!=""?'Alter schema':'Create schema',$l);if(!$K)$K["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($K["name"]);?>" autocapitalize="off">
<script type='text/javascript'>focus(document.getElementById('name'));</script>
<input type="submit" value="Save">
<?php
if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".'Drop'."'".confirm().">\n";echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["call"])){$da=$_GET["call"];page_header('Call'.": ".h($da),$l);$Xf=routine($da,(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$jd=array();$Ue=array();foreach($Xf["fields"]as$r=>$m){if(substr($m["inout"],-3)=="OUT")$Ue[$r]="@".idf_escape($m["field"])." AS ".idf_escape($m["field"]);if(!$m["inout"]||substr($m["inout"],0,2)=="IN")$jd[]=$r;}if(!$l&&$_POST){$Wa=array();foreach($Xf["fields"]as$x=>$m){if(in_array($x,$jd)){$X=process_input($m);if($X===false)$X="''";if(isset($Ue[$x]))$g->query("SET @".idf_escape($m["field"])." = $X");}$Wa[]=(isset($Ue[$x])?"@".idf_escape($m["field"]):$X);}$H=(isset($_GET["callf"])?"SELECT":"CALL")." ".idf_escape($da)."(".implode(", ",$Wa).")";echo"<p><code class='jush-$w'>".h($H)."</code> <a href='".h(ME)."sql=".urlencode($H)."'>".'Edit'."</a>\n";if(!$g->multi_query($H))echo"<p class='error'>".error()."\n";else{$h=connect();if(is_object($h))$h->select_db(DB);do{$I=$g->store_result();if(is_object($I))select($I,$h);else
echo"<p class='message'>".lang(array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),$g->affected_rows)."\n";}while($g->next_result());if($Ue)select($g->query("SELECT ".implode(", ",$Ue)));}}echo'
<form action="" method="post">
';if($jd){echo"<table cellspacing='0'>\n";foreach($jd
as$x){$m=$Xf["fields"][$x];$C=$m["field"];echo"<tr><th>".$b->fieldName($m);$Y=$_POST["fields"][$C];if($Y!=""){if($m["type"]=="enum")$Y=+$Y;if($m["type"]=="set")$Y=array_sum($Y);}input($m,$Y,(string)$_POST["function"][$C]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="Call">
<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$C=$_GET["name"];$K=$_POST;if($_POST&&!$l&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$ee=($_POST["drop"]?'Foreign key has been dropped.':($C!=""?'Foreign key has been altered.':'Foreign key has been created.'));$A=ME."table=".urlencode($a);$K["source"]=array_filter($K["source"],'strlen');ksort($K["source"]);$Pg=array();foreach($K["source"]as$x=>$X)$Pg[$x]=$K["target"][$x];$K["target"]=$Pg;if($w=="sqlite")queries_redirect($A,$ee,recreate_table($a,$a,array(),array(),array(" $C"=>($_POST["drop"]?"":" ".format_foreign_key($K)))));else{$c="ALTER TABLE ".table($a);$Ub="\nDROP ".($w=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($C);if($_POST["drop"])query_redirect($c.$Ub,$A,$ee);else{query_redirect($c.($C!=""?"$Ub,":"")."\nADD".format_foreign_key($K),$A,$ee);$l='Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.'."<br>$l";}}}page_header('Foreign key',$l,array("table"=>$a),h($a));if($_POST){ksort($K["source"]);if($_POST["add"])$K["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$K["target"]=array();}elseif($C!=""){$Lc=foreign_keys($a);$K=$Lc[$C];$K["source"][]="";}else{$K["table"]=$a;$K["source"]=array("");}$sg=array_keys(fields($a));$Pg=($a===$K["table"]?$sg:array_keys(fields($K["table"])));$Jf=array_keys(array_filter(table_status('',true),'fk_support'));echo'
<form action="" method="post">
<p>
';if($K["db"]==""&&$K["ns"]==""){echo'Target table:
',html_select("table",$Jf,$K["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Change"></noscript>
<table cellspacing="0">
<thead><tr><th>Source<th>Target</thead>
';$zd=0;foreach($K["source"]as$x=>$X){echo"<tr>","<td>".html_select("source[".(+$x)."]",array(-1=>"")+$sg,$X,($zd==count($K["source"])-1?"foreignAddRow(this);":1)),"<td>".html_select("target[".(+$x)."]",$Pg,$K["target"][$x]);$zd++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+explode("|",$De),$K["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+explode("|",$De),$K["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add column"></noscript>
';}if($C!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$K=$_POST;if($_POST&&!$l){$C=trim($K["name"]);$Ea=" AS\n$K[select]";$A=ME."table=".urlencode($C);$ee='View has been altered.';if(!$_POST["drop"]&&$a==$C&&$w!="sqlite")query_redirect(($w=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($C).$Ea,$A,$ee);else{$Rg=$C."_adminer_".uniqid();drop_create("DROP VIEW ".table($a),"CREATE VIEW ".table($C).$Ea,"DROP VIEW ".table($C),"CREATE VIEW ".table($Rg).$Ea,"DROP VIEW ".table($Rg),($_POST["drop"]?substr(ME,0,-1):$A),'View has been dropped.',$ee,'View has been created.',$a,$C);}}if(!$_POST&&$a!=""){$K=view($a);$K["name"]=$a;if(!$l)$l=$g->error;}page_header(($a!=""?'Alter view':'Create view'),$l,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>Name: <input name="name" value="',h($K["name"]),'" maxlength="64" autocapitalize="off">
<p>';textarea("select",$K["select"]);echo'<p>
<input type="submit" value="Save">
';if($_GET["view"]!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$td=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$yg=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$K=$_POST;if($_POST&&!$l){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),'Event has been dropped.');elseif(in_array($K["INTERVAL_FIELD"],$td)&&isset($yg[$K["STATUS"]])){$cg="\nON SCHEDULE ".($K["INTERVAL_VALUE"]?"EVERY ".q($K["INTERVAL_VALUE"])." $K[INTERVAL_FIELD]".($K["STARTS"]?" STARTS ".q($K["STARTS"]):"").($K["ENDS"]?" ENDS ".q($K["ENDS"]):""):"AT ".q($K["STARTS"]))." ON COMPLETION".($K["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?'Event has been altered.':'Event has been created.'),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$cg.($aa!=$K["EVENT_NAME"]?"\nRENAME TO ".idf_escape($K["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($K["EVENT_NAME"]).$cg)."\n".$yg[$K["STATUS"]]." COMMENT ".q($K["EVENT_COMMENT"]).rtrim(" DO\n$K[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?'Alter event'.": ".h($aa):'Create event'),$l);if(!$K&&$aa!=""){$L=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$K=reset($L);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>Name<td><input name="EVENT_NAME" value="',h($K["EVENT_NAME"]),'" maxlength="64" autocapitalize="off">
<tr><th title="datetime">Start<td><input name="STARTS" value="',h("$K[EXECUTE_AT]$K[STARTS]"),'">
<tr><th title="datetime">End<td><input name="ENDS" value="',h($K["ENDS"]),'">
<tr><th>Every<td><input type="number" name="INTERVAL_VALUE" value="',h($K["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$td,$K["INTERVAL_FIELD"]),'<tr><th>Status<td>',html_select("STATUS",$yg,$K["STATUS"]),'<tr><th>Comment<td><input name="EVENT_COMMENT" value="',h($K["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$K["ON_COMPLETION"]=="PRESERVE",'On completion preserve'),'</table>
<p>';textarea("EVENT_DEFINITION",$K["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="Save">
';if($aa!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=$_GET["procedure"];$Xf=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$K=$_POST;$K["fields"]=(array)$K["fields"];if($_POST&&!process_fields($K["fields"])&&!$l){$Rg="$K[name]_adminer_".uniqid();drop_create("DROP $Xf ".idf_escape($da),create_routine($Xf,$K),"DROP $Xf ".idf_escape($K["name"]),create_routine($Xf,array("name"=>$Rg)+$K),"DROP $Xf ".idf_escape($Rg),substr(ME,0,-1),'Routine has been dropped.','Routine has been altered.','Routine has been created.',$da,$K["name"]);}page_header(($da!=""?(isset($_GET["function"])?'Alter function':'Alter procedure').": ".h($da):(isset($_GET["function"])?'Create function':'Create procedure')),$l);if(!$_POST&&$da!=""){$K=routine($da,$Xf);$K["name"]=$da;}$ib=get_vals("SHOW CHARACTER SET");sort($ib);$Yf=routine_languages();echo'
<form action="" method="post" id="form">
<p>Name: <input name="name" value="',h($K["name"]),'" maxlength="64" autocapitalize="off">
',($Yf?'Language'.": ".html_select("language",$Yf,$K["language"]):""),'<input type="submit" value="Save">
<table cellspacing="0" class="nowrap">
';edit_fields($K["fields"],$ib,$Xf);if(isset($_GET["function"])){echo"<tr><td>".'Return type';edit_type("returns",$K["returns"],$ib);}echo'</table>
<p>';textarea("definition",$K["definition"]);echo'<p>
<input type="submit" value="Save">
';if($da!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$K=$_POST;if($_POST&&!$l){$_=substr(ME,0,-1);$C=trim($K["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$_,'Sequence has been dropped.');elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($C),$_,'Sequence has been created.');elseif($fa!=$C)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($C),$_,'Sequence has been altered.');else
redirect($_);}page_header($fa!=""?'Alter sequence'.": ".h($fa):'Create sequence',$l);if(!$K)$K["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($K["name"]),'" autocapitalize="off">
<input type="submit" value="Save">
';if($fa!="")echo"<input type='submit' name='drop' value='".'Drop'."'".confirm().">\n";echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$K=$_POST;if($_POST&&!$l){$_=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$_,'Type has been dropped.');else
query_redirect("CREATE TYPE ".idf_escape(trim($K["name"]))." $K[as]",$_,'Type has been created.');}page_header($ga!=""?'Alter type'.": ".h($ga):'Create type',$l);if(!$K)$K["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".'Drop'."'".confirm().">\n";else{echo"<input name='name' value='".h($K['name'])."' autocapitalize='off'>\n";textarea("as",$K["as"]);echo"<p><input type='submit' value='".'Save'."'>\n";}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$C=$_GET["name"];$nh=trigger_options();$lh=array("INSERT","UPDATE","DELETE");$K=(array)trigger($C)+array("Trigger"=>$a."_bi");if($_POST){if(!$l&&in_array($_POST["Timing"],$nh["Timing"])&&in_array($_POST["Event"],$lh)&&in_array($_POST["Type"],$nh["Type"])){$Ce=" ON ".table($a);$Ub="DROP TRIGGER ".idf_escape($C).($w=="pgsql"?$Ce:"");$A=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($Ub,$A,'Trigger has been dropped.');else{if($C!="")queries($Ub);queries_redirect($A,($C!=""?'Trigger has been altered.':'Trigger has been created.'),queries(create_trigger($Ce,$_POST)));if($C!="")queries(create_trigger($Ce,$K+array("Type"=>reset($nh["Type"]))));}}$K=$_POST;}page_header(($C!=""?'Alter trigger'.": ".h($C):'Create trigger'),$l,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>Time<td>',html_select("Timing",$nh["Timing"],$K["Timing"],"if (/^".preg_quote($a,"/")."_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '".js_escape($a)."_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();"),'<tr><th>Event<td>',html_select("Event",$lh,$K["Event"],"this.form['Timing'].onchange();"),'<tr><th>Type<td>',html_select("Type",$nh["Type"],$K["Type"]),'</table>
<p>Name: <input name="Trigger" value="',h($K["Trigger"]),'" maxlength="64" autocapitalize="off">
<p>';textarea("Statement",$K["Statement"]);echo'<p>
<input type="submit" value="Save">
';if($C!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$xf=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$K){foreach(explode(",",($K["Privilege"]=="Grant option"?"":$K["Context"]))as$tb)$xf[$tb][$K["Privilege"]]=$K["Comment"];}$xf["Server Admin"]+=$xf["File access on server"];$xf["Databases"]["Create routine"]=$xf["Procedures"]["Create routine"];unset($xf["Procedures"]["Create routine"]);$xf["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$xf["Columns"][$X]=$xf["Tables"][$X];unset($xf["Server Admin"]["Usage"]);foreach($xf["Tables"]as$x=>$X)unset($xf["Databases"][$x]);$re=array();if($_POST){foreach($_POST["objects"]as$x=>$X)$re[$X]=(array)$re[$X]+(array)$_POST["grants"][$x];}$Uc=array();$Ae="";if(isset($_GET["host"])&&($I=$g->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($K=$I->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$K[0],$B)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$B[1],$Wd,PREG_SET_ORDER)){foreach($Wd
as$X){if($X[1]!="USAGE")$Uc["$B[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$K[0]))$Uc["$B[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$K[0],$B))$Ae=$B[1];}}if($_POST&&!$l){$Be=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $Be",ME."privileges=",'User has been dropped.');else{$te=q($_POST["user"])."@".q($_POST["host"]);$ef=$_POST["pass"];if($ef!=''&&!$_POST["hashed"]){$ef=$g->result("SELECT PASSWORD(".q($ef).")");$l=!$ef;}$zb=false;if(!$l){if($Be!=$te){$zb=queries(($g->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $te IDENTIFIED BY PASSWORD ".q($ef));$l=!$zb;}elseif($ef!=$Ae)queries("SET PASSWORD FOR $te = ".q($ef));}if(!$l){$Uf=array();foreach($re
as$xe=>$Tc){if(isset($_GET["grant"]))$Tc=array_filter($Tc);$Tc=array_keys($Tc);if(isset($_GET["grant"]))$Uf=array_diff(array_keys(array_filter($re[$xe],'strlen')),$Tc);elseif($Be==$te){$ze=array_keys((array)$Uc[$xe]);$Uf=array_diff($ze,$Tc);$Tc=array_diff($Tc,$ze);unset($Uc[$xe]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$xe,$B)&&(!grant("REVOKE",$Uf,$B[2]," ON $B[1] FROM $te")||!grant("GRANT",$Tc,$B[2]," ON $B[1] TO $te"))){$l=true;break;}}}if(!$l&&isset($_GET["host"])){if($Be!=$te)queries("DROP USER $Be");elseif(!isset($_GET["grant"])){foreach($Uc
as$xe=>$Uf){if(preg_match('~^(.+)(\\(.*\\))?$~U',$xe,$B))grant("REVOKE",array_keys($Uf),$B[2]," ON $B[1] FROM $te");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'User has been altered.':'User has been created.'),!$l);if($zb)$g->query("DROP USER $te");}}page_header((isset($_GET["host"])?'Username'.": ".h("$ha@$_GET[host]"):'Create user'),$l,array("privileges"=>array('','Privileges')));if($_POST){$K=$_POST;$Uc=$re;}else{$K=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$K["pass"]=$Ae;if($Ae!="")$K["hashed"]=true;$Uc[(DB==""||$Uc?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>Server<td><input name="host" maxlength="60" value="',h($K["host"]),'" autocapitalize="off">
<tr><th>Username<td><input name="user" maxlength="16" value="',h($K["user"]),'" autocapitalize="off">
<tr><th>Password<td><input name="pass" id="pass" value="',h($K["pass"]),'">
';if(!$K["hashed"]){echo'<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';}echo
checkbox("hashed",1,$K["hashed"],'Hashed',"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".'Privileges'.doc_link(array('sql'=>"grant.html#priv_level"));$r=0;foreach($Uc
as$xe=>$Tc){echo'<th>'.($xe!="*.*"?"<input name='objects[$r]' value='".h($xe)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$r]' value='*.*' size='10'>*.*");$r++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Server',"Databases"=>'Database',"Tables"=>'Table',"Columns"=>'Column',"Procedures"=>'Routine',)as$tb=>$Kb){foreach((array)$xf[$tb]as$wf=>$mb){echo"<tr".odd()."><td".($Kb?">$Kb<td":" colspan='2'").' lang="en" title="'.h($mb).'">'.h($wf);$r=0;foreach($Uc
as$xe=>$Tc){$C="'grants[$r][".h(strtoupper($wf))."]'";$Y=$Tc[strtoupper($wf)];if($tb=="Server Admin"&&$xe!=(isset($Uc["*.*"])?"*.*":".*"))echo"<td>&nbsp;";elseif(isset($_GET["grant"]))echo"<td><select name=$C><option><option value='1'".($Y?" selected":"").">".'Grant'."<option value='0'".($Y=="0"?" selected":"").">".'Revoke'."</select>";else
echo"<td align='center'><label class='block'><input type='checkbox' name=$C value='1'".($Y?" checked":"").($wf=="All privileges"?" id='grants-$r-all'":($wf=="Grant option"?"":" onclick=\"if (this.checked) formUncheck('grants-$r-all');\""))."></label>";$r++;}}}echo"</table>\n",'<p>
<input type="submit" value="Save">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$l){$Fd=0;foreach((array)$_POST["kill"]as$X){if(queries("KILL ".(+$X)))$Fd++;}queries_redirect(ME."processlist=",lang(array('%d process has been killed.','%d processes have been killed.'),$Fd),$Fd||!$_POST["kill"]);}page_header('Process list',$l);echo'
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" ondblclick="tableClick(event, true);" class="nowrap checkable">
';$r=-1;foreach(process_list()as$r=>$K){if(!$r){echo"<thead><tr lang='en'>".(support("kill")?"<th>&nbsp;":"");foreach($K
as$x=>$X)echo"<th>$x".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($x),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"../b14237/dynviews_2088.htm",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$K["Id"],0):"");foreach($K
as$x=>$X)echo"<td>".(($w=="sql"&&$x=="Info"&&preg_match("~Query|Killed~",$K["Command"])&&$X!="")||($w=="pgsql"&&$x=="current_query"&&$X!="<IDLE>")||($w=="oracle"&&$x=="sql_text"&&$X!="")?"<code class='jush-$w'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($K["db"]!=""?"db=".urlencode($K["db"])."&":"")."sql=".urlencode($X)).'">'.'Clone'.'</a>':nbsp($X));echo"\n";}echo'</table>
<script type=\'text/javascript\'>tableCheck();</script>
<p>
';if(support("kill")){echo($r+1)."/".sprintf('%d in total',$g->result("SELECT @@max_connections")),"<p><input type='submit' value='".'Kill'."'>\n";}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$v=indexes($a);$n=fields($a);$Lc=column_foreign_keys($a);$ye="";if($R["Oid"]){$ye=($w=="sqlite"?"rowid":"oid");$v[]=array("type"=>"PRIMARY","columns"=>array($ye));}parse_str($_COOKIE["adminer_import"],$wa);$Vf=array();$f=array();$Vg=null;foreach($n
as$x=>$m){$C=$b->fieldName($m);if(isset($m["privileges"]["select"])&&$C!=""){$f[$x]=html_entity_decode(strip_tags($C),ENT_QUOTES);if(is_shortable($m))$Vg=$b->selectLengthProcess();}$Vf+=$m["privileges"];}list($M,$q)=$b->selectColumnsProcess($f,$v);$ud=count($q)<count($M);$Z=$b->selectSearchProcess($n,$v);$Me=$b->selectOrderProcess($n,$v);$z=$b->selectLimitProcess();$Qc=($M?implode(", ",$M):"*".($ye?", $ye":"")).convert_fields($f,$n,$M)."\nFROM ".table($a);$Vc=($q&&$ud?"\nGROUP BY ".implode(", ",$q):"").($Me?"\nORDER BY ".implode(", ",$Me):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$vh=>$K){$Ea=convert_field($n[key($K)]);echo$g->result("SELECT".limit($Ea?$Ea:idf_escape(key($K))." FROM ".table($a)," WHERE ".where_check($vh,$n).($Z?" AND ".implode(" AND ",$Z):"").($Me?" ORDER BY ".implode(", ",$Me):""),1));}exit;}if($_POST&&!$l){$Qh=$Z;if(!$_POST["all"]&&is_array($_POST["check"]))$Qh[]="((".implode(") OR (",array_map('where_check',$_POST["check"]))."))";$Qh=($Qh?"\nWHERE ".implode(" AND ",$Qh):"");$sf=$xh=null;foreach($v
as$u){if($u["type"]=="PRIMARY"){$sf=array_flip($u["columns"]);$xh=($M?$sf:array());break;}}foreach((array)$xh
as$x=>$X){if(in_array(idf_escape($x),$M))unset($xh[$x]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$xh===array())$H="SELECT $Qc$Qh$Vc";else{$th=array();foreach($_POST["check"]as$X)$th[]="(SELECT".limit($Qc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$n).$Vc,1).")";$H=implode(" UNION ALL ",$th);}$b->dumpData($a,"table",$H);exit;}if(!$b->selectEmailProcess($Z,$Lc)){if($_POST["save"]||$_POST["delete"]){$I=true;$xa=0;$O=array();if(!$_POST["delete"]){foreach($f
as$C=>$X){$X=process_input($n[$C]);if($X!==null&&($_POST["clone"]||$X!==false))$O[idf_escape($C)]=($X!==false?$X:idf_escape($C));}}if($_POST["delete"]||$O){if($_POST["clone"])$H="INTO ".table($a)." (".implode(", ",array_keys($O)).")\nSELECT ".implode(", ",$O)."\nFROM ".table($a);if($_POST["all"]||($xh===array()&&is_array($_POST["check"]))||$ud){$I=($_POST["delete"]?$Sb->delete($a,$Qh):($_POST["clone"]?queries("INSERT $H$Qh"):$Sb->update($a,$O,$Qh)));$xa=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Ph="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$n);$I=($_POST["delete"]?$Sb->delete($a,$Ph,1):($_POST["clone"]?queries("INSERT".limit1($H,$Ph)):$Sb->update($a,$O,$Ph)));if(!$I)break;$xa+=$g->affected_rows;}}}$ee=lang(array('%d item has been affected.','%d items have been affected.'),$xa);if($_POST["clone"]&&$I&&$xa==1){$Jd=last_id();if($Jd)$ee=sprintf('Item%s has been inserted.'," $Jd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$ee,$I);}elseif(!$_POST["import"]){if(!$_POST["val"])$l='Ctrl+click on a value to modify it.';else{$I=true;$xa=0;foreach($_POST["val"]as$vh=>$K){$O=array();foreach($K
as$x=>$X){$x=bracket_escape($x,1);$O[idf_escape($x)]=(preg_match('~char|text~',$n[$x]["type"])||$X!=""?$b->processInput($n[$x],$X):"NULL");}$I=$Sb->update($a,$O," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($vh,$n),!($ud||$xh===array())," ");if(!$I)break;$xa+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$xa),$I);}}elseif(!is_string($Ec=get_file("csv_file",true)))$l=upload_error($Ec);elseif(!preg_match('~~u',$Ec))$l='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($wa["output"])."&format=".urlencode($_POST["separator"]));$I=true;$jb=array_keys($n);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Ec,$Wd);$xa=count($Wd[0]);$Sb->begin();$kg=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$L=array();foreach($Wd[0]as$x=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$kg]*)$kg~",$X.$kg,$Xd);if(!$x&&!array_diff($Xd[1],$jb)){$jb=$Xd[1];$xa--;}else{$O=array();foreach($Xd[1]as$r=>$gb)$O[idf_escape($jb[$r])]=($gb==""&&$n[$jb[$r]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$gb))));$L[]=$O;}}$I=(!$L||$Sb->insertUpdate($a,$L,$sf));if($I)$Sb->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$xa),$I);$Sb->rollback();}}}$Hg=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $Hg",$l);$O=null;if(isset($Vf["insert"])||!support("table")){$O="";foreach((array)$_GET["where"]as$X){if(count($Lc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$O.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$O);if(!$f&&support("table"))echo"<p class='error'>".'Unable to select the table'.($n?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($M,$f);$b->selectSearchPrint($Z,$f,$v);$b->selectOrderPrint($Me,$f,$v);$b->selectLimitPrint($z);$b->selectLengthPrint($Vg);$b->selectActionPrint($v);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$Oc=$g->result(count_rows($a,$Z,$ud,$q));$E=floor(max(0,$Oc-1)/$z);}$hg=$M;if(!$hg){$hg[]="*";if($ye)$hg[]=$ye;}$ub=convert_fields($f,$n,$M);if($ub)$hg[]=substr($ub,2);$I=$Sb->select($a,$hg,$Z,$q,$Me,$z,$E);if(!$I)echo"<p class='error'>".error()."\n";else{if($w=="mssql"&&$E)$I->seek($z*$E);$gc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$L=array();while($K=$I->fetch_assoc()){if($E&&$w=="oracle")unset($K["RNUM"]);$L[]=$K;}if($_GET["page"]!="last"&&+$z&&$q&&$ud&&$w=="sql")$Oc=$g->result(" SELECT FOUND_ROWS()");if(!$L)echo"<p class='message'>".'No rows.'."\n";else{$Na=$b->backwardKeys($a,$Hg);echo"<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$q&&$M?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$qe=array();$Sc=array();reset($M);$Ff=1;foreach($L[0]as$x=>$X){if($x!=$ye){$X=$_GET["columns"][key($M)];$m=$n[$M?($X?$X["col"]:current($M)):$x];$C=($m?$b->fieldName($m,$Ff):($X["fun"]?"*":$x));if($C!=""){$Ff++;$qe[$x]=$C;$e=idf_escape($x);$ed=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($x);$Kb="&desc%5B0%5D=1";echo'<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">','<a href="'.h($ed.($Me[0]==$e||$Me[0]==$x||(!$Me&&$ud&&$q[0]==$e)?$Kb:'')).'">';echo
apply_sql_function($X["fun"],$C)."</a>";echo"<span class='column hidden'>","<a href='".h($ed.$Kb)."' title='".'descending'."' class='text'> â†“</a>";if(!$X["fun"])echo'<a href="#fieldset-search" onclick="selectSearch(\''.h(js_escape($x)).'\'); return false;" title="'.'Search'.'" class="text jsonly"> =</a>';echo"</span>";}$Sc[$x]=$X["fun"];next($M);}}$Od=array();if($_GET["modify"]){foreach($L
as$K){foreach($K
as$x=>$X)$Od[$x]=max($Od[$x],min(40,strlen(utf8_decode($X))));}}echo($Na?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($z%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($L,$Lc)as$pe=>$K){$uh=unique_array($L[$pe],$v);if(!$uh){$uh=array();foreach($L[$pe]as$x=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$x))$uh[$x]=$X;}}$vh="";foreach($uh
as$x=>$X){if(strlen($X)>64&&($w=="sql"||$w=="pgsql")){$x="MD5(".(strpos($x,'(')?$x:idf_escape($x)).")";$X=md5($X);}$vh.="&".($X!==null?urlencode("where[".bracket_escape($x)."]")."=".urlencode($X):"null%5B%5D=".urlencode($x));}echo"<tr".odd().">".(!$q&&$M?"":"<td>".checkbox("check[]",substr($vh,1),in_array(substr($vh,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").($ud||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$vh)."'>".'edit'."</a>"));foreach($K
as$x=>$X){if(isset($qe[$x])){$m=$n[$x];if($X!=""&&(!isset($gc[$x])||$gc[$x]!=""))$gc[$x]=(is_mail($X)?$qe[$x]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$m["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($x).$vh;if(!$_){foreach((array)$Lc[$x]as$o){if(count($Lc[$x])==1||end($o["source"])==$x){$_="";foreach($o["source"]as$r=>$sg)$_.=where_link($r,$o["target"][$r],$L[$pe][$sg]);$_=($o["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($o["db"]),ME):ME).'select='.urlencode($o["table"]).$_;if(count($o["source"])==1)break;}}}if($x=="COUNT(*)"){$_=ME."select=".urlencode($a);$r=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$uh))$_.=where_link($r++,$W["col"],$W["val"],$W["op"]);}foreach($uh
as$_d=>$W)$_.=where_link($r++,$_d,$W);}$X=select_value($X,$_,$m,$Vg);$s=h("val[$vh][".bracket_escape($x)."]");$Y=$_POST["val"][$vh][bracket_escape($x)];$cc=!is_array($K[$x])&&is_utf8($X)&&$L[$pe][$x]==$K[$x]&&!$Sc[$x];$Ug=preg_match('~text|lob~',$m["type"]);if(($_GET["modify"]&&$cc)||$Y!==null){$Xc=h($Y!==null?$Y:$K[$x]);echo"<td>".($Ug?"<textarea name='$s' cols='30' rows='".(substr_count($K[$x],"\n")+1)."'>$Xc</textarea>":"<input name='$s' value='$Xc' size='$Od[$x]'>");}else{$Td=strpos($X,"<i>...</i>");echo"<td id='$s' onclick=\"selectClick(this, event, ".($Td?2:($Ug?1:0)).($cc?"":", '".h('Use edit link to modify this value.')."'").");\">$X";}}}if($Na)echo"<td>";$b->backwardKeysPrint($Na,$L[$pe]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(($L||$E)&&!is_ajax()){$rc=true;if($_GET["page"]!="last"){if(!+$z)$Oc=count($L);elseif($w!="sql"||!$ud){$Oc=($ud?false:found_rows($R,$Z));if($Oc<max(1e4,2*($E+1)*$z))$Oc=reset(slow_query(count_rows($a,$Z,$ud,$q)));else$rc=false;}}if(+$z&&($Oc===false||$Oc>$z||$E)){echo"<p class='pages'>";$Zd=($Oc===false?$E+(count($L)>=$z?2:1):floor(($Oc-1)/$z));if(support("table")){echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".'Page'."', '".($E+1)."'), event); return false;\">".'Page'."</a>:",pagination(0,$E).($E>5?" ...":"");for($r=max(1,$E-4);$r<min($Zd,$E+5);$r++)echo
pagination($r,$E);if($Zd>0){echo($E+5<$Zd?" ...":""),($rc&&$Oc!==false?pagination($Zd,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Zd'>".'last'."</a>");}echo(($Oc===false?count($L)+1:$Oc-$E*$z)>$z?' <a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" onclick="return !selectLoadMore(this, '.(+$z).', \''.'Loading'.'...\');">'.'Load more data'.'</a>':'');}else{echo'Page'.":",pagination(0,$E).($E>1?" ...":""),($E?pagination($E,$E):""),($Zd>$E?pagination($E+1,$E).($Zd>$E+1?" ...":""):"");}}echo"<p class='count'>\n",($Oc!==false?"(".($rc?"":"~ ").lang(array('%d row','%d rows'),$Oc).") ":"");$Qb=($rc?"":"~ ").$Oc;echo
checkbox("all",1,0,'whole result',"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Qb' : checked); selectCount('selected2', this.checked || !checked ? '$Qb' : checked);")."\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete"',confirm(),'>
</div></fieldset>
';}$Mc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Mc['sql']);break;}}if($Mc){print_fieldset("export",'Export'." <span id='selected2'></span>");$Ve=$b->dumpOutput();echo($Ve?html_select("output",$Ve,$wa["output"])." ":""),html_select("format",$Mc,$wa["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}echo(!$q&&$M?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($b->selectImportPrint()){print_fieldset("import",'Import',!$L);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$wa["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($gc,'strlen'),$f);echo"<p><input type='hidden' name='token' value='$T'></p>\n","</form>\n";}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$xg=isset($_GET["status"]);page_header($xg?'Status':'Variables');$Ih=($xg?show_status():show_variables());if(!$Ih)echo"<p class='message'>".'No rows.'."\n";else{echo"<table cellspacing='0'>\n";foreach($Ih
as$x=>$X){echo"<tr>","<th><code class='jush-".$w.($xg?"status":"set")."'>".h($x)."</code>","<td>".nbsp($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Eg=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$C=>$R){$s=js_escape($C);json_row("Comment-$s",nbsp($R["Comment"]));if(!is_view($R)){foreach(array("Engine","Collation")as$x)json_row("$x-$s",nbsp($R[$x]));foreach($Eg+array("Auto_increment"=>0,"Rows"=>0)as$x=>$X){if($R[$x]!=""){$X=number_format($R[$x],0,'.',',');json_row("$x-$s",($x=="Rows"&&$X&&$R["Engine"]==($ug=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Eg[$x]))$Eg[$x]+=($R["Engine"]!="InnoDB"||$x!="Data_free"?$R[$x]:0);}elseif(array_key_exists($x,$R))json_row("$x-$s");}}}foreach($Eg
as$x=>$X)json_row("sum-$x",number_format($X,0,'.',','));json_row("");}elseif($_GET["script"]=="kill")$g->query("KILL ".(+$_POST["kill"]));else{foreach(count_tables($b->databases())as$k=>$X)json_row("tables-".js_escape($k),$X);json_row("");}exit;}else{$Ng=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Ng&&!$l&&!$_POST["search"]){$I=true;$ee="";if($w=="sql"&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$I=truncate_tables($_POST["tables"]);$ee='Tables have been truncated.';}elseif($_POST["move"]){$I=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$ee='Tables have been moved.';}elseif($_POST["copy"]){$I=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$ee='Tables have been copied.';}elseif($_POST["drop"]){if($_POST["views"])$I=drop_views($_POST["views"]);if($I&&$_POST["tables"])$I=drop_tables($_POST["tables"]);$ee='Tables have been dropped.';}elseif($w!="sql"){$I=($w=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$ee='Tables have been optimized.';}elseif(!$_POST["tables"])$ee='No tables.';elseif($I=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($K=$I->fetch_assoc())$ee.="<b>".h($K["Table"])."</b>: ".h($K["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$ee,$I);}page_header(($_GET["ns"]==""?'Database'.": ".h(DB):'Schema'.": ".h($_GET["ns"])),$l,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".'Tables and views'."</h3>\n";$Mg=tables_list();if(!$Mg)echo"<p class='message'>".'No tables.'."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".'Search data in tables'." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' name='search' value='".'Search'."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!="")search_tables();}echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);">','<th>'.'Table','<td>'.'Engine','<td>'.'Collation','<td>'.'Data Length','<td>'.'Index Length','<td>'.'Data Free','<td>'.'Auto Increment','<td>'.'Rows',(support("comment")?'<td>'.'Comment':''),"</thead>\n";$S=0;foreach($Mg
as$C=>$U){$Lh=($U!==null&&!preg_match('~table~i',$U));echo'<tr'.odd().'><td>'.checkbox(($Lh?"views[]":"tables[]"),$C,in_array($C,$Ng,true),"","formUncheck('check-all');"),'<th>'.(support("table")?'<a href="'.h(ME).'table='.urlencode($C).'" title="'.'Show structure'.'">'.h($C).'</a>':h($C));if($Lh){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($C).'" title="'.'Alter view'.'">'.'View'.'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($C).'" title="'.'Select data'.'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",'Alter table'),"Index_length"=>array("indexes",'Alter indexes'),"Data_free"=>array("edit",'New item'),"Auto_increment"=>array("auto_increment=1&create",'Alter table'),"Rows"=>array("select",'Select data'),)as$x=>$_){$s=" id='$x-".h($C)."'";echo($_?"<td align='right'>".(support("table")||$x=="Rows"?"<a href='".h(ME."$_[0]=").urlencode($C)."'$s title='$_[1]'>?</a>":"<span$s>?</span>"):"<td id='$x-".h($C)."'>&nbsp;");}$S++;}echo(support("comment")?"<td id='Comment-".h($C)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".sprintf('%d in total',count($Mg)),"<td>".nbsp($w=="sql"?$g->result("SELECT @@storage_engine"):""),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$x)echo"<td align='right' id='sum-$x'>&nbsp;";echo"</table>\n";if(!information_schema(DB)){$Fh="<input type='submit' value='".'Vacuum'."'".on_help("'VACUUM'")."> ";$Ie="<input type='submit' name='optimize' value='".'Optimize'."'".on_help($w=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'")."> ";echo"<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>".($w=="sqlite"?$Fh:($w=="pgsql"?$Fh.$Ie:($w=="sql"?"<input type='submit' value='".'Analyze'."'".on_help("'ANALYZE TABLE'")."> ".$Ie."<input type='submit' name='check' value='".'Check'."'".on_help("'CHECK TABLE'")."> "."<input type='submit' name='repair' value='".'Repair'."'".on_help("'REPAIR TABLE'")."> ":""))).(support("table")?"<input type='submit' name='truncate' value='".'Truncate'."'".confirm().on_help($w=="sqlite"?"'DELETE'":"'TRUNCATE".($w=="pgsql"?"'":" TABLE'"))."> ":"")."<input type='submit' name='drop' value='".'Drop'."'".confirm().on_help("'DROP TABLE'").">\n";$j=(support("scheme")?$b->schemas():$b->databases());if(count($j)!=1&&$w!="sqlite"){$k=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'Move to other database'.": ",($j?html_select("target",$j,$k):'<input name="target" value="'.h($k).'" autocapitalize="off">')," <input type='submit' name='move' value='".'Move'."'>",(support("copy")?" <input type='submit' name='copy' value='".'Copy'."'>":""),"\n";}echo"<input type='hidden' name='all' value='' onclick=\"selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $S);":"")."\">\n";echo"<input type='hidden' name='token' value='$T'>\n","</div></fieldset>\n";}echo"</form>\n","<script type='text/javascript'>tableCheck();</script>\n";}echo'<p class="links"><a href="'.h(ME).'create=">'.'Create table'."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.'Create view'."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".'Routines'."</h3>\n";$Zf=routines();if($Zf){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'Name'.'<td>'.'Type'.'<td>'.'Return type'."<td>&nbsp;</thead>\n";odd('');foreach($Zf
as$K){echo'<tr'.odd().'>','<th><a href="'.h(ME).($K["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($K["ROUTINE_NAME"]).'">'.h($K["ROUTINE_NAME"]).'</a>','<td>'.h($K["ROUTINE_TYPE"]),'<td>'.h($K["DTD_IDENTIFIER"]),'<td><a href="'.h(ME).($K["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($K["ROUTINE_NAME"]).'">'.'Alter'."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.'Create procedure'.'</a>':'').'<a href="'.h(ME).'function=">'.'Create function'."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".'Sequences'."</h3>\n";$lg=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema()");if($lg){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($lg
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".'Create sequence'."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".'User types'."</h3>\n";$Dh=types();if($Dh){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($Dh
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".'Create type'."</a>\n";}if(support("event")){echo"<h3 id='events'>".'Events'."</h3>\n";$L=get_rows("SHOW EVENTS");if($L){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."<td>".'Schedule'."<td>".'Start'."<td>".'End'."<td></thead>\n";foreach($L
as$K){echo"<tr>","<th>".h($K["Name"]),"<td>".($K["Execute at"]?'At given time'."<td>".$K["Execute at"]:'Every'." ".$K["Interval value"]." ".$K["Interval field"]."<td>$K[Starts]"),"<td>$K[Ends]",'<td><a href="'.h(ME).'event='.urlencode($K["Name"]).'">'.'Alter'.'</a>';}echo"</table>\n";$pc=$g->result("SELECT @@event_scheduler");if($pc&&$pc!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($pc)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.'Create event'."</a>\n";}if($Mg)echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=db');</script>\n";}}}page_footer();