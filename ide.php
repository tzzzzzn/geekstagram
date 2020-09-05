<!DOCTYPE html>
<html>

<head>
    <title>IDE</title>
    <link rel="stylesheet" href="css/form.css">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Create a simple CodeMirror instance -->
    <link rel="stylesheet" href="codemirror/lib/codemirror.css"/>
        <script src="codemirror/lib/codemirror.js"></script>
        <link rel="stylesheet" href="codemirror/theme/dracula.css"/>
        <script src="codemirror/mode/clike/clike.js"></script>
        <script src="codemirror/addon/edit/matchbrackets.js"></script>
        <script src="codemirror/addon/edit/closebrackets.js"></script>
</head>

<body style="font-family: cursive;background-color: lightslategray;">

    <form>
        <div id='left_space'>
            <div class="dropdown">
                <select name="language" style="font-family: fantasy;font-size: 26px;">
                    <option value="C++">C++</option>
                    <option value="C">C</option>
                </select>
            </div>
            <div>
                <textarea placeholder="Type the code" name="code" id="editor"></textarea>
                <script>
                        var editor1 = CodeMirror.fromTextArea(document.getElementById('editor'), 
                        {
                            mode:'text/x-c++src',
                            lineNumbers: true,
                            theme:'dracula',
                            matchBrackets:true,
                            autoCloseBrackets:true,
                            unitIndent:4
                      });
                    editor1.options.placeholder="enter the code";
                    editor1.setSize('620','500')
                    editor1.setValue('#include<bits/stdc++.h>\nusing namespace std;\nint main()\n{\n  //Enter the code\n}');
                </script>
            </div>
            <div id='input_space'>
                <h1> Input</h1>
                <textarea id="input_area" placeholder="Enter the Input" name="input_text"></textarea>
            </div>
            <div id='run_space'>
                <button id="run" type="button">Run</button>
                <script>
                    $('#run')[0].onclick = function() {
//                        $('#run').off('click');
                        $('#run_area')[0].value ="executing....";
                        $.post('run.php', {
                            code: editor1.getValue(),
                            input_text: $('#input_area')[0].value
                        }, function(data) {
                            $('#run_area')[0].value = data;
                        })
//                        $('#run').on('click');
                    }
                </script>
                <textarea id="run_area" placeholder="This is the output"></textarea>
            </div>
        </div>
        <div id="right">
            <h1>Question</h1>
            <textarea id="question_area" placeholder="Write the question?"></textarea>
            <h1>Approach</h1>
            <textarea id="approach_area" placeholder="Brefily explain the approach in comments"></textarea>
            <h1>Tags</h1>
            <textarea id="tags_area" placeholder="Enter topics this question falls in"></textarea>
            <br>
            <button id="store" type="button">Post</button>
            <script>
                $('#store')[0].onclick = function() {
                    $.post('database/3_storing.php', {
                            code: editor1.getValue(),
                            input1: $('#input_area')[0].value,
                            question: $('#question_area')[0].value,
                            approach: $('#approach_area')[0].value,
                            tags: $('#tags_area')[0].value
                        },
                        function(data) {
                            console.log(data);
                        })
                }
            </script>
        </div>
    </form>
</body>

</html>







.