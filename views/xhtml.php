<!DOCTYPE html PUBLIC
    "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title><?php echo $title?></title>
        <?php echo asset::stylesheets($styles, 'cache/cached-css-file') ?>
        <?php echo asset::javascripts($scripts, 'cache/cached-js-file') ?>
    </head>

    <body>

        <div class="container">
            <div id="dashboard-header" class="span-24">
                <h1><?php echo $title?></h1>
                <p><?php echo $slogan?></p>
            </div>


            <div id="dashboard-navigation"><?php echo $navigation?></div>
            <div id="dashboard-subheader" class="span-16">
                <h2><?php // echo $module_title?></h2>
                <p><?php // echo $module_description?></p>
            </div>

            <div id="dashboard-control" class="span-8 last">
                <h2><?php // echo $control_title?></h2>
                <p><?php //echo $control_content?></p>
            </div>


            <div id="dashboard-content" class="span-24">
                <?php echo $content?>
            </div>

            <hr/>
            <div id="dashboard-footer">
                <?php echo $footer?>
            </div>
            <hr/>
            <?php echo $login_box?>
        </div>

    </body>
</html>