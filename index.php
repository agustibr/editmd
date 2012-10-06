<?php

if ($_POST) {
    $path = $_POST['path'];
    $file = $_POST['file'];
    if (isset($_POST['md'])) {
        $file_contents = $_POST['md'];
        $fh = fopen($path_file, "w");
        fwrite($fh, $file_contents);
        fclose($fh);
    }
} else {
    $path = 'content/';
    $file = 'test1.md';
}
 
$path_file = $path.$file;
$file_contents = file_get_contents($path_file);
$content = $file_contents;
?>
<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>Edit MarkDown</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" type="text/css" href="pagedown/pagedown.css" />
        
        <!-- <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> -->
        <script type="text/javascript" src="pagedown/Markdown.Converter.js"></script>
        <script type="text/javascript" src="pagedown/Markdown.Sanitizer.js"></script>
        <script type="text/javascript" src="pagedown/Markdown.Editor.js"></script>

    </head>
    
    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span7">
                    <div id="wmd-preview" class="wmd-preview"></div>
                </div>
                <div class="span5 affixX" data-spy="affixX" data-offset-top="200X">
                    <div class="wmd-panel">
                        <div id="wmd-button-bar"><button class="btn btn-mini btn-primary pull-right"><i class="icon-hdd icon-white"></i> Desar</button></div>
                        <form method="post">
                            <input type="hidden" name="path" value="<?php echo $path;?>"/>
                            <input type="hidden" name="file" value="<?php echo $file;?>"/>
                            <textarea class="wmd-input" id="wmd-input" name="md"><?php echo $content;?></textarea>
                            
                        </form>
                    </div>
                </div>
         
                
            </div>
        </div>

        <script type="text/javascript">
            (function () {
                //var converter1 = Markdown.getSanitizingConverter();
                var converter1 = new Markdown.Converter();
                var editor1 = new Markdown.Editor(converter1);
                editor1.run();
                
                // var converter2 = new Markdown.Converter();

                // converter2.hooks.chain("preConversion", function (text) {
                //     return text.replace(/\b(a\w*)/gi, "*$1*");
                // });

                // converter2.hooks.chain("plainLinkText", function (url) {
                //     return "This is a link to " + url.replace(/^https?:\/\//, "");
                // });
                
                // var help = function () { alert("Do you need help?"); }
                
                // var editor2 = new Markdown.Editor(converter2, "-second", { handler: help });
                
                // editor2.run();
            })();
        </script>
    </body>
</html>
