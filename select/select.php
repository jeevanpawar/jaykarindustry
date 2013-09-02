<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("select#type").attr("disabled","disabled");
            $("select#category").change(function(){
            $("select#type").attr("disabled","disabled");
            $("select#type").html("<option>wait...</option>");
            var id = $("select#category option:selected").attr('value');
            $.post("select_type.php", {id:id}, function(data){
                $("select#type").removeAttr("disabled");
                $("select#type").html(data);
            });
        });
        $("form#select_form").submit(function(){
            var cat = $("select#category option:selected").attr('value');
            var type = $("select#type option:selected").attr('value');
            if(cat>0 && type>0)
            {
                var result = $("select#type option:selected").html();
                $("#result").html('your choice: '+result);
            }
            else
            {
                $("#result").html("you must choose two options!");
            }
            return false;
        });
    });
    </script>
    </head>
    <body>
        <?php include "select.class.php"; ?>
        <form id="select_form">
            Choose a category:<br />
            <select id="category">
                <?php echo $opt->ShowCategory(); ?>
            </select>
        <br /><br />
        Choose a type:<br />
        <select id="type">
             <option value="0">choose...</option>
        </select>
        <br /><br />
        <input type="submit" value="confirm" />
        </form>
        <div id="result"></div>
    </body>
</html>