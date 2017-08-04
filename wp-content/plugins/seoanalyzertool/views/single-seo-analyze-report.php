<?php
/**
 * Template Name: Page SEO Analyze Report
 * @package WordPress
 *
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Youngseaser SEO Analyze tool</title>

    <meta name="csrf-param" content="authenticity_token">
    <meta name="csrf-token" content="hakciIwoAtJe/Ha3zZXe6/l9QqLle3uV56n70t35PyWbQPrOHQuXu9yQfPdwsRWbuDy0vs6+6MLx5guWQpEaOQ==">

    <script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>js/home.js"></script>
    <script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>js/tooltipster.bundle.js"></script>

    <!-- segment analytics -->
    <script type="text/javascript">
        ! function() {
            var analytics = window.analytics = window.analytics || [];
            if (!analytics.initialize)
                if (analytics.invoked) window.console && console.error && console.error("Segment snippet included twice.");
                else {
                    analytics.invoked = !0;
                    analytics.methods = ["trackSubmit", "trackClick", "trackLink", "trackForm", "pageview", "identify", "reset", "group", "track", "ready", "alias", "page", "once", "off", "on"];
                    analytics.factory = function(t) {
                        return function() {
                            var e = Array.prototype.slice.call(arguments);
                            e.unshift(t);
                            analytics.push(e);
                            return analytics
                        }
                    };
                    for (var t = 0; t < analytics.methods.length; t++) {
                        var e = analytics.methods[t];
                        analytics[e] = analytics.factory(e)
                    }
                    analytics.load = function(t) {
                        var e = document.createElement("script");
                        e.type = "text/javascript";
                        e.async = !0;
                        e.src = ("https:" === document.location.protocol ? "https://" : "http://") + "cdn.segment.com/analytics.js/v1/" + t + "/analytics.min.js";
                        var n = document.getElementsByTagName("script")[0];
                        n.parentNode.insertBefore(e, n)
                    };
                    analytics.SNIPPET_VERSION = "3.1.0";
                    analytics.load("uwtppXpcckgKIGCNPoYMM4Ns8vVd0gus");
                }
        }();
    </script>

    <!-- Qualaroo -->
    <script type="text/javascript">
        var _kiq = _kiq || [];
        _kiq.push(['disableAuto']);
        (function() {
            setTimeout(function() {
                var d = document,
                    f = d.getElementsByTagName('script')[0],
                    s = d.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = '//s3.amazonaws.com/ki.js/3/bmv.js';
                f.parentNode.insertBefore(s, f);
            }, 1);
        })();
    </script>

    <!-- Fullstory -->
    <script>
        window['_fs_debug'] = false;
        window['_fs_host'] = 'www.fullstory.com';
        window['_fs_org'] = 'N25V';
        window['_fs_namespace'] = 'FS';
        (function(m, n, e, t, l, o, g, y) {
            if (e in m && m.console && m.console.log) {
                m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');
                return;
            }
            g = m[e] = function(a, b) {
                g.q ? g.q.push([a, b]) : g._api(a, b);
            };
            g.q = [];
            o = n.createElement(t);
            o.async = 1;
            o.src = 'https://' + _fs_host + '/s/fs.js';
            y = n.getElementsByTagName(t)[0];
            y.parentNode.insertBefore(o, y);
            g.identify = function(i, v) {
                g(l, {
                    uid: i
                });
                if (v) g(l, v)
            };
            g.setUserVars = function(v) {
                g(l, v)
            };
            g.identifyAccount = function(i, v) {
                o = 'account';
                v = v || {};
                v.acctId = i;
                g(o, v)
            };
            g.clearUserCookie = function(c, d, i) {
                if (!c || document.cookie.match('fs_uid=[`;`]*`[`;`]*`[`;`]*`')) {
                    d = n.domain;
                    while (1) {
                        n.cookie = 'fs_uid=;domain=' + d +
                            ';path=/;expires=' + new Date(0).toUTCString();
                        i = d.indexOf('.');
                        if (i < 0) break;
                        d = d.slice(i + 1)
                    }
                }
            };
        })(window, document, window['_fs_namespace'], 'script', 'user');
    </script>

    <link rel="stylesheet" id="validation_css-css" href="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>css/jquery.validate.css" type="text/css" media="all">
    <link rel="stylesheet" id="youngseaser-hp-normalize-css" href="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>css/page-home-normalize.css" type="text/css" media="all">
    <link rel="stylesheet" id="youngseaser-hp-css" href="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>css/page-home-sidebar.css" type="text/css" media="all">
    <link rel="stylesheet" id="validation_css-css" href="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>css/application.css" type="text/css" media="all">
    <link rel="stylesheet" id="validation_css-css" href="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>css/css_2.css" type="text/css" media="all">
    <link rel="stylesheet" id="validation_css-css" href="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>css/css_3.css" type="text/css" media="all">
    <script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>js/jquery-migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>js/jquery.validate.js"></script>

</head>

<body class="analyzer quicksprout">
<!-- segment requires this here with turbolinks -->
<script>
    analytics.page()
</script>

<div class="wrapper">
    <header>
        <nav class="navbar navbar-green">
            <a class="navbar-brand" href="https://www.quicksprout.com">
                <img height="25" alt="Quick Sprout Logo" src="fonts/quicksprout-logo-typeface-white-ed01724571ec4aceab6a782e4e3af41495bb75f28d4c91adffafbe0683f67398.svg">
            </a>
            <ul class="nav navbar-nav navbar-search">
                <li class="nav-item">
                    <form action="/analyzer" accept-charset="UTF-8" method="post">
                        <input name="utf8" type="hidden" value="&#x2713;">
                        <input type="hidden" name="authenticity_token" value="ylhvyMut2KMOv6JvFzrEjvJ4GFi6aM6R79NPGrcRhNvUsYmOWo5NyozTqC+qHg/+sznuRJGtXcb5nL9eKHmhxw==">
                        <div class="input-group">
                            <input type="text" name="url" id="url" value="" class="form-control form-control-sm" placeholder="Analyze another page&hellip;">
                            <span class="input-group-btn">
                <input type="submit" name="commit" value="" class="btn btn-sm btn-secondary">
              </span>
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right pull-xs-right">
                <li class="nav-item">
                    <a class="btn btn-sm btn-link" href="/signup?url=http%3A%2F%2Fwww.youngceaser.com%2F">Log in</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm btn-secondary" href="/signup?url=http%3A%2F%2Fwww.youngceaser.com%2F">Sign up</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <div class="container">

            <div id="report">

                <div class="row">
                    <div class="col-sm-11 p-x-0">
                        <div class="analyzer-summary">
                            <p><span class="label text-success">Website review for:</span></p>
                            <h1><?php echo $url;?></h1>
                            <h4></h4>
                            <p class="lead">Quick Sprout found <strong style="color:#FF9600;">18
                                    warnings on this page.</strong></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                    </div>

                    <div class="card card-analyzer card-analyzer-seo m-t-2">
                        <div class="card-content">
                            <div class="card-inset">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h2>Search Results</h2>
                                        <p class="lead">How people find this page when using search engines.</p>
                                    </div>
                                </div>
                                <hr class="m-b-3">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <h3>Search Results Preview</h3>
                                        <p class="lead">This is how this page appears in Google's search results.</p>
                                        <section>
                                            <div class="card alert full-width card-google">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4><?php echo $content['title'];?></h4>
                                                        <a href="<?php echo $url;?>" target="_blank"><?php echo $url;?></a>
                                                        <p><?php echo $content['description'];?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <hr>

                                        <h3>Page Title</h3>
                                        <section>
                                            <?php $titleLength = strlen($content['title']);?>
                                            <?php if($titleLength  > 15 || $titleLength < 65):?>
                                                <h4 class="text-success"><span class="label">Pass</span> The page title length is perfect</h4>
                                                <p><strong>The page title is <?php echo $titleLength;?> characters.</strong> The ideal length is 15-65 characters. If your title tag exceed 60 characters, Google will only show the first 60.</p>
                                            <?php elseif($titleLength  < 15):?>
                                                <h4 class="text-warning"><span class="label">Pass</span> The page title length is too short</h4>
                                                <p><strong>The page title is <?php echo $titleLength;?> characters.</strong> The ideal length is 15-65 characters. If your title tag exceed 60 characters, Google will only show the first 60.</p>
                                            <?php elseif($titleLength  > 65):?>
                                                <h4 class="text-warning"><span class="label">Pass</span> The page title length is too long</h4>
                                                <p><strong>The page title is <?php echo $titleLength;?> characters.</strong> The ideal length is 15-65 characters. If your title tag exceed 60 characters, Google will only show the first 60.</p>
                                            <?php endif;?>
                                        </section>

                                        <section>
                                            <?php if(!empty($content['title'])):?>
                                                <h4 class="text-success"><span class="label">Pass</span> Page title found</h4>
                                                <p><strong>This page has a page title.</strong> It's important to have one page title on every page of your website. Title tags are the online equivalent of newspaper headlines.</p>
                                            <?php else:?>
                                                <h4 class="text-warning"><span class="label">Warning</span> Page title not found</h4>
                                                <p><strong>This page has no page title.</strong> It's important to have one page title on every page of your website. Title tags are the online equivalent of newspaper headlines.</p>
                                            <?php endif;?>
                                        </section>

                                        <hr>

                                        <h3>Meta Description</h3>
                                        <?php $descriptionLength = strlen($content['description']);?>
                                        <?php if($descriptionLength > 51 && $descriptionLength < 160):?>
                                        <section>
                                            <h4 class="text-success"><span class="label">Pass</span> The meta description is perfect</h4>
                                            <p><strong>The meta description is <?php echo $descriptionLength;?> characters.</strong> The meta description is what search engines use to gauge what topic you’re writing about and the exact audience that they should send to that page. So, make it descriptive and short – optimally between 51-160 characters.</p>
                                            <?php elseif($titleLength  > 160):?>
                                                <h4 class="text-warning"><span class="label">Warning</span> The meta description is too long</h4>
                                                <p><strong>The meta description is <?php echo $descriptionLength;?> characters.</strong> The meta description is what search engines use to gauge what topic you’re writing about and the exact audience that they should send to that page. So, make it descriptive and short – optimally between 51-160 characters.</p>
                                            <?php elseif($titleLength  < 51):?>
                                                <h4 class="text-warning"><span class="label">Warning</span> The meta description is too short</h4>
                                                <p><strong>The meta description is <?php echo $descriptionLength;?> characters.</strong> The meta description is what search engines use to gauge what topic you’re writing about and the exact audience that they should send to that page. So, make it descriptive and short – optimally between 51-160 characters.</p>
                                            <?php endif;?>
                                        </section>

                                        <section>
                                            <?php if(!empty($content['description'])):?>
                                                <h4 class="text-success"><span class="label">Pass</span> Meta description found</h4>
                                                <p><strong>This page has a meta description.</strong> It's important to only have one meta description every page of your website. The meta description shows visitors what your page is about in search engine results.</p>
                                            <?php else:?>
                                                <h4 class="text-warning"><span class="label">Warning</span> No meta description found</h4>
                                                <p><strong>This page has a meta description.</strong> It's important to only have one meta description every page of your website. The meta description shows visitors what your page is about in search engine results.</p>
                                            <?php endif;?>
                                        </section>

                                        <div id="685f3839-c788-47a2-818a-ce96677ab94c" class="monitor-nudge">
                                            <hr>

                                            <div class="card alert full-width card-fix">
                                                <div class="row" style="padding: 2rem 1rem 2rem 2rem;">
                                                    <div class="col-md-12 col-lg-6">
                                                        <h5>Never miss a problem with <?php echo $url;?></h5>
                                                        <p>Get email updates that tell you exactly what's wrong with your website.</p>
                                                    </div>
                                                    <div class="col-md-12 col-lg-6 p-a-0">
                                                        <form class="form-inline pull-lg-right" action="/analyzer/monitor" accept-charset="UTF-8" data-remote="true" method="post">
                                                            <input name="utf8" type="hidden" value="&#x2713;">
                                                            <input class="form-control form-control-md" placeholder="Enter your email address" id="685f3839-c788-47a2-818a-ce96677ab94c" type="text" name="analyzer_email[email]">
                                                            <input value="212ea9245e4aa3965b5fcf4c1eaf19d5299c5383c94b4b6185b83d9f06821565" type="hidden" name="analyzer_email[page_id]" id="analyzer_email_page_id">
                                                            <input value="685f3839-c788-47a2-818a-ce96677ab94c" type="hidden" name="analyzer_email[form_id]" id="analyzer_email_form_id">
                                                            <input value="inline" type="hidden" name="analyzer_email[source]" id="analyzer_email_source">
                                                            <input type="submit" name="commit" value="Monitor this website" class="btn btn-md btn-primary">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                    </div>
                    <div class="card card-analyzer card-analyzer-seo m-t-2">
                        <div class="card-content">
                            <div class="card-inset">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h2>Headings &amp; Content</h2>
                                        <p class="lead">How this page communicates or engages users.</p>
                                    </div>
                                </div>
                                <hr class="m-b-3">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <h3>Page Headline</h3>

                                        <section>
                                            <?php if(!empty($content['headings']['h1'])):?>
                                                <h4 class="text-success"><span class="label">Pass</span>&lt;H1&gt; tags present on page</h4>
                                                <p><strong>&lt;H1&gt; tags were found on the page.</strong> At the very least, make sure your page has one &lt;H1&gt; heading. This is a great way to give your keywords meaning and structure your page content accordingly.</p>
                                            <?php else:?>
                                                <h4 class="text-warning"><span class="label">Warning</span> There are no &lt;H1&gt; tags</h4>
                                                <p><strong>No &lt;H1&gt; tags were found on the page.</strong> At the very least, make sure your page has one &lt;H1&gt; heading. This is a great way to give your keywords meaning and structure your page content accordingly.</p>
                                            <?php endif;?>
                                        </section>

                                        <hr>

                                        <h3>Subheadings</h3>
                                        <section>

                                            <h4 class="text-warning"><span class="label">Warning</span> Subheadings too short or too long</h4>
                                            <p>These subheadings may be too short or too long. Subheadings make your content easier to scan.</p>
                                            <table class="table table-hover">
                                                <thead class="thead-default">
                                                <tr>
                                                    <th>Subheadings</th>
                                                    <th>Result</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($content['headings'] as $tag => $heading):?>
                                                    <?php if($tag !== 'h1'):?>
                                                        <?php if(!empty($heading['warning'])):?>
                                                            <?php foreach($heading['warning'] as $key => $value):?>
                                                                <?php if($key == 'short'):?>
                                                                    <?php foreach($value as $k => $v):?>
                                                                        <tr>
                                                                            <td><?php echo $tag;?>: <?php echo $v[0];?></td>
                                                                            <td><?php echo $v['extra_length']?> characters too short</td>
                                                                        </tr>
                                                                    <?php endforeach;?>
                                                                <?php elseif($key == 'long'):?>
                                                                    <?php foreach($value as $k => $v):?>
                                                                        <tr>
                                                                            <td><?php echo $tag;?>: <?php echo $v[0];?></td>
                                                                            <td><?php echo $v['extra_length']?> characters too long</td>
                                                                        </tr>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>

                                            <h4 class="text-success"><span class="label">Pass</span> Subheadings good length</h4>
                                            <p>These subheadings are a great length, which makes your content easier to scan.</p>
                                            <table class="table table-hover">
                                                <thead class="thead-default">
                                                <tr>
                                                    <th>Subheadings</th>
                                                    <th>Length</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($content['headings'] as $tag => $heading):?>
                                                    <?php if($tag !== 'h1'):?>
                                                        <?php if(!empty($heading['pass'])):?>
                                                            <?php foreach($heading['pass'] as $key => $value):?>
                                                                <tr>
                                                                    <td><?php echo $tag;?>: <?php echo $value[0];?></td>
                                                                    <td><?php echo $value['length'];?></td>
                                                                </tr>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>

                                        </section>

                                        <div id="53e91108-b479-416e-b109-19dad673155e" class="monitor-nudge">
                                            <hr>

                                            <div class="card alert full-width card-fix">
                                                <div class="row" style="padding: 2rem 1rem 2rem 2rem;">
                                                    <div class="col-md-12 col-lg-6">
                                                        <h5>Never miss a problem with youngceaser.com</h5>
                                                        <p>Get email updates that tell you exactly what's wrong with your website.</p>
                                                    </div>
                                                    <div class="col-md-12 col-lg-6 p-a-0">
                                                        <form class="form-inline pull-lg-right" action="/analyzer/monitor" accept-charset="UTF-8" data-remote="true" method="post">
                                                            <input name="utf8" type="hidden" value="&#x2713;">
                                                            <input class="form-control form-control-md" placeholder="Enter your email address" id="53e91108-b479-416e-b109-19dad673155e" type="text" name="analyzer_email[email]">
                                                            <input value="212ea9245e4aa3965b5fcf4c1eaf19d5299c5383c94b4b6185b83d9f06821565" type="hidden" name="analyzer_email[page_id]" id="analyzer_email_page_id">
                                                            <input value="53e91108-b479-416e-b109-19dad673155e" type="hidden" name="analyzer_email[form_id]" id="analyzer_email_form_id">
                                                            <input value="inline" type="hidden" name="analyzer_email[source]" id="analyzer_email_source">
                                                            <input type="submit" name="commit" value="Monitor this website" class="btn btn-md btn-primary">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                    </div>
                    <div class="card card-analyzer card-analyzer-seo m-t-2">
                        <div class="card-content">
                            <div class="card-inset">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h2>Links</h2>
                                        <p class="lead">The hyperlinks found on this page.</p>
                                    </div>
                                </div>
                                <hr class="m-b-3">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <h3>Internal Links<h3>
                                                <section>
                                                    <h4 class="text-success"><span class="label">Pass</span> Internal links found</h4>
                                                    <p>We found 6 <strong>internal links</strong> on this page.</p>
                                                </section>

                                                <hr>
                                                <h3>Links To Your Site<h3>
                                                        <section>
                                                            <h4 class="text-success"><span class="label">Pass</span> 62 Links to your site found.</h4>
                                                            <p><strong>Links to your site</strong> help you get more traffic and higher search rankings.</p>
                                                        </section>

                                                        <div id="ca2b2386-8eec-4922-a232-14bb58a09492" class="monitor-nudge">
                                                            <hr>

                                                            <div class="card alert full-width card-fix">
                                                                <div class="row" style="padding: 2rem 1rem 2rem 2rem;">
                                                                    <div class="col-md-12 col-lg-6">
                                                                        <h5>Never miss a problem with youngceaser.com</h5>
                                                                        <p>Get email updates that tell you exactly what's wrong with your website.</p>
                                                                    </div>
                                                                    <div class="col-md-12 col-lg-6 p-a-0">
                                                                        <form class="form-inline pull-lg-right" action="/analyzer/monitor" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;">
                                                                            <input class="form-control form-control-md" placeholder="Enter your email address" id="ca2b2386-8eec-4922-a232-14bb58a09492" type="text" name="analyzer_email[email]">
                                                                            <input value="212ea9245e4aa3965b5fcf4c1eaf19d5299c5383c94b4b6185b83d9f06821565" type="hidden" name="analyzer_email[page_id]" id="analyzer_email_page_id">
                                                                            <input value="ca2b2386-8eec-4922-a232-14bb58a09492" type="hidden" name="analyzer_email[form_id]" id="analyzer_email_form_id">
                                                                            <input value="inline" type="hidden" name="analyzer_email[source]" id="analyzer_email_source">
                                                                            <input type="submit" name="commit" value="Monitor this website" class="btn btn-md btn-primary">
                                                                        </form>        </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </h3></h3>
                                            </h3>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                    </div>
                    <div class="card card-analyzer card-analyzer-seo m-t-2">
                        <div class="card-content">
                            <div class="card-inset">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h2>Analyze More Pages</h2>
                                        <p class="lead">We found other pages on your site you can analyze with Quick Sprout.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <table class="table table-hover">
                                            <thead class="thead-default">
                                            <tr>
                                                <th colspan="2">Page</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>http://www.youngceaser.com/</td>
                                                <td>
                                                    <a class="btn btn-sm btn-secondary" href="/analyzer?url=http%3A%2F%2Fwww.youngceaser.com%2F">Analyze this page</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>http://www.youngceaser.com/subscription/</td>
                                                <td>
                                                    <a class="btn btn-sm btn-secondary" href="/analyzer?url=http%3A%2F%2Fwww.youngceaser.com%2Fsubscription%2F">Analyze this page</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>http://www.youngceaser.com/#</td>
                                                <td>
                                                    <a class="btn btn-sm btn-secondary" href="/analyzer?url=http%3A%2F%2Fwww.youngceaser.com%2F%23">Analyze this page</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>http://www.youngceaser.com/get-custom-quote/</td>
                                                <td>
                                                    <a class="btn btn-sm btn-secondary" href="/analyzer?url=http%3A%2F%2Fwww.youngceaser.com%2Fget-custom-quote%2F">Analyze this page</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>http://www.youngceaser.com/localseo/</td>
                                                <td>
                                                    <a class="btn btn-sm btn-secondary" href="/analyzer?url=http%3A%2F%2Fwww.youngceaser.com%2Flocalseo%2F">Analyze this page</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>http://www.youngceaser.com/ytviral/</td>
                                                <td>
                                                    <a class="btn btn-sm btn-secondary" href="/analyzer?url=http%3A%2F%2Fwww.youngceaser.com%2Fytviral%2F">Analyze this page</a>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>

                                        <div id="9647ea24-2ec0-4fcf-9ee9-b33f98b4edf7" class="monitor-nudge">
                                            <hr>

                                            <div class="card alert full-width card-fix">
                                                <div class="row" style="padding: 2rem 1rem 2rem 2rem;">
                                                    <div class="col-md-12 col-lg-6">
                                                        <h5>Never miss a problem with youngceaser.com</h5>
                                                        <p>Get email updates that tell you exactly what's wrong with your website.</p>
                                                    </div>
                                                    <div class="col-md-12 col-lg-6 p-a-0">
                                                        <form class="form-inline pull-lg-right" action="/analyzer/monitor" accept-charset="UTF-8" data-remote="true" method="post">
                                                            <input name="utf8" type="hidden" value="&#x2713;">
                                                            <input class="form-control form-control-md" placeholder="Enter your email address" id="9647ea24-2ec0-4fcf-9ee9-b33f98b4edf7" type="text" name="analyzer_email[email]">
                                                            <input value="212ea9245e4aa3965b5fcf4c1eaf19d5299c5383c94b4b6185b83d9f06821565" type="hidden" name="analyzer_email[page_id]" id="analyzer_email_page_id">
                                                            <input value="9647ea24-2ec0-4fcf-9ee9-b33f98b4edf7" type="hidden" name="analyzer_email[form_id]" id="analyzer_email_form_id">
                                                            <input value="inline" type="hidden" name="analyzer_email[source]" id="analyzer_email_source">
                                                            <input type="submit" name="commit" value="Monitor this website" class="btn btn-md btn-primary">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row monitor-nudge">
                    <div class="col-lg-8 col-lg-offset-2 p-x-3">
                        <div class="cta-section text-xs-center clearfix">

                            <div id="footerMonitor">
                                <h2>Never miss an issue with quicksprout.com</h2>
                                <p class="lead">Get email updates that tell you exactly what's wrong with your website.</p>
                                <form class="form-inline form-control-lg" action="/analyzer/monitor" accept-charset="UTF-8" data-remote="true" method="post">
                                    <input name="utf8" type="hidden" value="&#x2713;">
                                    <input class="form-control form-control-lg" placeholder="Enter your email address" id="footerMonitor" type="text" name="analyzer_email[email]">
                                    <input value="212ea9245e4aa3965b5fcf4c1eaf19d5299c5383c94b4b6185b83d9f06821565" type="hidden" name="analyzer_email[page_id]" id="analyzer_email_page_id">
                                    <input value="footerMonitor" type="hidden" name="analyzer_email[form_id]" id="analyzer_email_form_id">
                                    <input value="footer" type="hidden" name="analyzer_email[source]" id="analyzer_email_source">
                                    <input type="submit" name="commit" value="Monitor this website" class="btn btn-lg btn-primary">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="monitorModal" tabindex="-1" role="dialog" aria-labelledby="monitorModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <div class="card">
                            <div class="card-cover">
                                <nav class="navbar navbar-light">
                                    <span class="navbar-text">Get free webpage monitoring</span>
                                </nav>
                            </div>
                            <div class="card-content">
                                <div class="card-inset">
                                    <div class="media">
                                            <span class="media-left hidden-sm-down p-r-2" href="#">
              <img height="70" src="fonts/icon-social-e10a05b4a8fb6b3f22df1869d4b0d75ae2b95a2f7ee2b00ed1dbd818174f5c25.svg" alt="Icon social e10a05b4a8fb6b3f22df1869d4b0d75ae2b95a2f7ee2b00ed1dbd818174f5c25">
            </span>
                                        <div class="media-body">
                                            <p class="lead">Quick Sprout will send an email notification keeping you informed about this page. Just enter your email address:</p>

                                            <fieldset class="form-group m-t-2">
                                                <label for="">Enter your email address:</label>
                                                <input type="text" class="form-control form-control-md p-a-1" id="">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer-button">
                                <button type="button" class="btn btn-lg btn-arrow btn-block btn-arrow">Monitor this webpage</button>
                            </div>
                        </div>
                        <p class="text-xs-center text-muted">Not right now, <a type="submit" href="#" data-dismiss="modal"><strong>return to review</strong></a>.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <footer>
        <nav class="navbar navbar-light">
            <a class="navbar-brand hidden-sm-down" href="https://www.quicksprout.com">
                <img height="25" alt="Quick Sprout Logo" src="fonts/quicksprout-logo-typeface-661e14ac015aa6af13f4f24f49c4c1e14d84d6be2ec842348665776aa746f29f.svg">
            </a>
            <ul class="nav navbar-nav navbar-right pull-md-right">
                <li class="nav-item">
                    <a href="https://www.quicksprout.com/terms/" class="btn btn-sm btn-link">Terms of Service</a>
                </li>
                <li class="nav-item">
                    <a href="https://www.quicksprout.com/privacy/" class="btn btn-sm btn-link">Privacy Policy</a>
                </li>
                <li class="nav-item">
                    <a href="http://changelog.quicksprout.com/" class="btn btn-sm btn-link">Changelog</a>
                </li>
            </ul>
        </nav>
    </footer>

</div>

<script src="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>js/application.js" data-turbolinks-track="true"></script>

<script>
    $('#monitorModal').on('shown.bs.modal', function(e) {
        analytics.track('Analyzer Viewed Monitor Modal', {
            url: 'http://www.youngceaser.com/'
        });
    });
    $('#monitorModal').on('hidden.bs.modal', function(e) {
        analytics.track('Analyzer Dismissed Monitor Modal', {
            url: 'http://www.youngceaser.com/'
        });
    });
    $('#signup-link').click(function(e) {
        analytics.track('Analyzer Clicked Upgrade', {
            url: 'http://www.youngceaser.com/'
        });
    });
</script>

<script src="<?php echo plugin_dir_url( __FILE__ ).'assets/';?>js/analyzer.js"></script>

</body>

</html>
