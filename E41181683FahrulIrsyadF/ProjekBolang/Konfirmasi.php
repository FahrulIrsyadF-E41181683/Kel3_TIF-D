<?php
include('connector.php');
?>

<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Konfirmasi Pembayaran</title>
    <meta name="keywords" content="konfirmasi pembayaran, konfirmasi pembayaran domainesia" />
    <meta name="description" content="Konfirmasi pembayaran atas tagihan dari DomaiNesia yang telah anda bayar " />
    <meta name="robots" content="all,index,follow">
    <meta name="author" content="DomaiNesia">
    <link rel="shortcut icon" href="//static.domainesia.com/favicon.png">
    <link href="https://plus.google.com/+Domainesiaplus" rel="publisher" />
    <link href="/assets/css/A.bootstrap.style.css,qv=20191031279.pagespeed.cf.9igD92kt8j.css" rel="stylesheet"
        type="text/css" media="screen" />
    <link rel="preload" href="https://cloud.typography.com/7229656/6876392/css/fonts.css" as="style"
        onload="this.rel='stylesheet'">
    <style media="screen" id="csstoday"></style>
    <link href="//static.domainesia.com/assets/css/datepicker.min.css" rel="stylesheet" type="text/css"
        media="screen" />
    <link rel="stylesheet" href="style.css">
    <script>(function (i, s, o, g, r, a, m) { i["GoogleAnalyticsObject"] = r; i[r] = i[r] || function () { (i[r].q = i[r].q || []).push(arguments) }, i[r].l = 1 * new Date(); a = s.createElement(o), m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m) })(window, document, "script", "//www.domainesia.com/assets/js/analytics.js", "ga"); ga("create", "UA-43136956-5", "auto");</script>
</head>

<body>
    <div class="bg-white">
        <div class="container konfirmasiContainer">
            <div class="row">
                <form class="form-horizontal" method="post" name="konfirmasiBayar" id="konfirmasiBayar">
                    <input type="hidden" name="csrfToken" value="VAWVHvqEmLPl0qEiNzGiDQbD2vNKpQ/hgPiuGufD78M=" />
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label" for="invoice">No. Tagihan/Invoice <i
                                    class="fa fa-question-circle" rel="popover" data-html="true"
                                    data-content="Pastikan penulisan nomor invoice sesuai dengan yang Anda terima, kesalahan penulisan sepenuhnya menjadi tanggung jawab Anda."></i></label>
                            <div class="col-sm-4 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input id="invoice" name="invoice" placeholder="41163" class="form-control"
                                        type="text" rel="popover" data-html="true"
                                        data-content="<img src='//static.domainesia.com/assets/images/invoice.png'>"
                                        autocomplete="off" required />
                                </div>
                            </div>
                        </div>
                        <div id="formKonfirmasi">
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" for="name">Nama</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input id="name" name="name" class="form-control input-md" type="text" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" for="email">Email</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input id="email" name="email" class="form-control input-md" type="email"
                                        required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" for="tanggal">Tanggal Pembayaran</label>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="input-group date">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input id="tanggal" name="tanggal" type="text" class="form-control"
                                            data-date-format="DD/MM/YYYY" placeholder="20/11/2019" required readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" for="jumlah">Jumlah Pembayaran</label>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input id="jumlah" name="jumlah" class="form-control" placeholder="99.500"
                                            type="text" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" for="bank">Bank Tujuan</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input id="bank" name="bank" placeholder="BCA / Mandiri"
                                        class="form-control input-md" type="text" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label" for="nama">Nama Rekening
                                    Pengirim</label>
                                <div class="col-sm-4 col-xs-12">
                                    <input id="nama" name="nama" class="form-control input-md" type="text" required />
                                </div>
                            </div>
                            <div id="bukti" class="form-group" hidden>
                                <label class="col-sm-4 col-xs-12 control-label" for="bukti">Bukti Transaksi</label>
                                <div class="col-sm-4 col-xs-12">
                                    <div id="buktiDropbox"></div>
                                    <input id="image" name="image" class="form-control input-md splash" type="text"
                                        value="" readonly />
                                </div>
                            </div>
                            <input type="submit" id="submitTrue" name="submitTrue" value="&#xf1d9;&nbsp;Kirim"
                                class="btn buttonPurchase splash">
                        </div>
                    </fieldset>
                </form>
                <form id="uploadbox" class="form-horizontal" enctype="multipart/form-data" method="POST"
                    action="/upload-bukti/">
                    <input type="hidden" name="csrfToken" value="VAWVHvqEmLPl0qEiNzGiDQbD2vNKpQ/hgPiuGufD78M=" />
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label" for="message">Bukti Transaksi</label>
                        <div class="col-sm-4 col-xs-12">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            <small>&nbsp;&nbsp;&nbsp;<code>5MB max (JPG, PNG, GIF & PDF)</code></small>
                        </div>
                    </div>
            </div>
            </form>
            <div class="form-group">
                <div class="col-xs-12 techMargin">
                    <label class="col-sm-4 col-xs-12 control-label" for="submit"></label>
                    <div class="col-sm-4 col-xs-12 centeralign">
                        <input type="submit" id="submit" name="submit" value="&#xf1d9;&nbsp;Kirim"
                            class="btn buttonPurchase" onclick="$('#submitTrue').click();">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="//static.domainesia.com/assets/js/jquery-bootstrap.js"></script>
    <script>var domainesiaDomain = ["com", "xyz", "online", "site", "tech", "store", "net", "org", "website", "space", "info", "co", "id", "app", "asia", "co.id", "biz.id", "or.id", "ac.id", "sch.id", "ponpes.id", "my.id", "web.id", "biz", "blog", "buzz", "cc", "click", "cloud", "club", "cool", "in", "ink", "io", "life", "link", "live", "lol", "me", "media", "mobi", "name", "news", "one", "photo", "press", "pro", "rocks", "shop", "social", "team", "top", "tv", "us", "wiki", "zone", "host", "pw"], meetYou = "70f8863dfd1102cbd1044e859bebc1b1", domainesiaDomainGratis = ["com", "xyz", "online", "site", "net", "org", "website", "space", "info", "co.id", "biz.id", "or.id", "ac.id", "sch.id", "my.id", "web.id", "name", "us"], domainesiaDomainGratisBisnis = ["com", "xyz", "net", "org", "info", "co.id", "biz.id", "or.id", "ac.id", "sch.id", "my.id", "web.id", "name", "us"], domainesiaDomainPromo = ["asia", "club", "com", "host", "me", "mobi", "net", "online", "org", "press", "pro", "pw", "rocks", "shop", "site", "social", "space", "store", "tech", "us", "website", "xyz", "buzz", "cool", "io", "life", "live", "media", "team", "top", "zone"];</script>
    <script src="//static.domainesia.com/assets/js/script.min.js?v=20191031279"></script>
    <script src="//static.domainesia.com/assets/js/lang/id.js?v=20191031279"></script>
    <script>console.log("" + "         / __ \\____  ____ ___  ____ _(_) | / /__  _____(_)___ _\n" + "        / / / / __ \\/ __ `__ \\/ __ `/ /  |/ / _ \\/ ___/ / __ `/    Hi there, nice to meet you!\n" + "       / /_/ / /_/ / / / / / / /_/ / / /|  /  __(__  ) / /_/ /\n" + "      /_____/\\____/_/ /_/ /_/\\__,_/_/_/ |_/\\___/____/_/\\__,_/     (c) 2017 DomaiNesia");</script>
    <script>console.log = function () { }</script>
    <script>adroll_adv_id = "YSETLUHNWJE3TC6YIAWZX2"; adroll_pix_id = "KGJ5ZCODBFHIVCI755367N"; (function () { var oldonload = window.onload; window.onload = function () { __adroll_loaded = true; var scr = document.createElement("script"); var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com"); scr.setAttribute("async", "true"); scr.type = "text/javascript"; scr.src = host + "/j/roundtrip.js"; ((document.getElementsByTagName("head") || [null])[0] || document.getElementsByTagName("script")[0].parentNode).appendChild(scr); if (oldonload) { oldonload() } }; }());</script>
    <script>ga("require", "displayfeatures"); ga("send", "pageview");</script>
    <script>window.intercomSettings = { app_id: 'w2omm14f', };</script>
    <script>(function () { var w = window; var ic = w.Intercom; if (typeof ic === 'function') { ic('reattach_activator'); ic('update', intercomSettings); } else { var d = document; var i = function () { i.c(arguments) }; i.q = []; i.c = function (args) { i.q.push(args) }; w.Intercom = i; function l() { var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = 'https://widget.intercom.io/widget/w2omm14f'; var x = d.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x); } if (w.attachEvent) { w.attachEvent('onload', l); } else { w.addEventListener('load', l, false); } } })()</script>
    <script
        type="text/javascript">(function (e, a) { if (!a.__SV) { var b = window; try { var c, l, i, j = b.location, g = j.hash; c = function (a, b) { return (l = a.match(RegExp(b + "=([^&]*)"))) ? l[1] : null }; g && c(g, "state") && (i = JSON.parse(decodeURIComponent(c(g, "state"))), "mpeditor" === i.action && (b.sessionStorage.setItem("_mpcehash", g), history.replaceState(i.desiredHash || "", e.title, j.pathname + j.search))) } catch (m) { } var k, h; window.mixpanel = a; a._i = []; a.init = function (b, c, f) { function e(b, a) { var c = a.split("."); 2 == c.length && (b = b[c[0]], a = c[1]); b[a] = function () { b.push([a].concat(Array.prototype.slice.call(arguments, 0))) } } var d = a; "undefined" !== typeof f ? d = a[f] = [] : f = "mixpanel"; d.people = d.people || []; d.toString = function (b) { var a = "mixpanel"; "mixpanel" !== f && (a += "." + f); b || (a += " (stub)"); return a }; d.people.toString = function () { return d.toString(1) + ".people (stub)" }; k = "disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" "); for (h = 0; h < k.length; h++)e(d, k[h]); a._i.push([b, c, f]) }; a.__SV = 1.2; b = e.createElement("script"); b.type = "text/javascript"; b.async = !0; b.src = "undefined" !== typeof MIXPANEL_CUSTOM_LIB_URL ? MIXPANEL_CUSTOM_LIB_URL : "file:" === e.location.protocol && "//cdn4.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//) ? "https://cdn4.mxpnl.com/libs/mixpanel-2-latest.min.js" : "//cdn4.mxpnl.com/libs/mixpanel-2-latest.min.js"; c = e.getElementsByTagName("script")[0]; c.parentNode.insertBefore(b, c) } })(document, window.mixpanel || []); mixpanel.init("fc60bb45df0d504571812e09b97dd8cb");</script>
    <script
        type="text/javascript">function getQueryParam(url, param) { param = param.replace(/[[]/, "\[").replace(/[]]/, "\]"); var regexS = "[\?&]" + param + "=([^&#]*)", regex = new RegExp(regexS), results = regex.exec(url); if (results === null || (results && typeof (results[1]) !== 'string' && results[1].length)) { return ''; } else { return decodeURIComponent(results[1]).replace(/\W/gi, ' '); } }; function campaignParams() { var campaign_keywords = 'utm_source utm_medium utm_campaign utm_content utm_term'.split(' '), kw = '', params = {}, first_params = {}; var index; for (index = 0; index < campaign_keywords.length; ++index) { kw = getQueryParam(document.URL, campaign_keywords[index]); if (kw.length) { params[campaign_keywords[index] + ' [last touch]'] = kw; } } for (index = 0; index < campaign_keywords.length; ++index) { kw = getQueryParam(document.URL, campaign_keywords[index]); if (kw.length) { first_params[campaign_keywords[index] + ' [first touch]'] = kw; } } mixpanel.people.set(params); mixpanel.people.set_once(first_params); mixpanel.register(params); } campaignParams();</script>
    <script>mixpanel.track("UserVisits", { "affiliate_id": "", "last_utm_source": "", "last_utm_medium": "", "last_utm_campaign": "", "last_utm_content": "" });</script>
    <script>if (document.cookie.indexOf('allpagebounce') == -1 && window.innerWidth > 768) { var modal = ouibounce(document.getElementById('ouibounce-modal'), { cookieName: 'allpagebounce', sitewide: true, cookieExpire: 1 }); setTimeout(function () { modal.fire(); }, 4000); modal.disable(); modal.disable({ cookieExpire: 1, sitewide: true }); $('body').on('click', function () { $('#ouibounce-modal').hide(); }); $('#ouibounce-modal .modal-footer').on('click', function () { $('#ouibounce-modal').hide(); }); }</script>
    <script>$('.heading').appendTo('.footing'); $('.footing').hide();</script>
    <script src='//static.domainesia.com/assets/js/popover.loader.js'></script>
    <script src='//static.domainesia.com/assets/js/jquery.validate.min.js'></script>
    <script src="//static.domainesia.com/assets/js/lang/bv-id-ID.js"></script>
    <script src='//static.domainesia.com/assets/js/moment.js'></script>
    <script src='//static.domainesia.com/assets/js/datepicker.min.js'></script>
    <script>var xhr = new XMLHttpRequest(); xhr.open('GET', '//static.domainesia.com/assets/images/invoice.png', true); xhr.send(null);</script>
</body>

</html>