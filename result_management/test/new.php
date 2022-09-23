<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/ css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Marks</title>
</head>

<body>
    <div class="container">
        <h2 align="center">Insert Marks</h2>
        <br />
        <div class="table-respomsive">
            <table class="table table-bordered" id="marks_table">
                <tr>
                    <th>Roll No</th>
                    <th>Exam code</th>
                    <th>Subject code</th>
                    <th>Marks</th>
                    <th width="5%"></th>
                </tr>
                <tr>
                    <td contenteditable='true' class="roll_no"></td>
                    <td contenteditable='true' class="exam_code"></td>
                    <td contenteditable='true' class="subject_code"></td>
                    <td contenteditable='true' class="marks"></td>

                    <td></td>
                </tr>

            </table>
            <div align="right">
                <button type="button" name="add" id="add" class="btn btn-success">+</button>
            </div>
            <div align="center">
                <button class="btn btn-info" name="save" id="save">Save</button>
            </div>
            <br />

            <div id="inserted_item_data"></div>


        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        var count = 1;
        $('#add').click(function() {
            count = count + 1;
            var html_code = "<tr id='row" + count + "'>";
            html_code += "<td contenteditable='true' class='roll_no'></td>";
            html_code += "<td contenteditable='true' class='exam_code'></td>";
            html_code += "<td contenteditable='true' class='subject_code'></td>";
            html_code += "<td contenteditable='true' class='marks'></td>";
            html_code += "<td><button type='button' name='remove' data-row='row" + count + "' class='btn btn-danger btn-xs remove'>-</button></td>";
            html_code += "</tr>";
            $('#marks_table').append(html_code);
        });
        $(document).on('click', '.remove', function() {
            var delete_row = $(this).data("row");
            $('#' + delete_row).remove();
        });
        $('#save').click(function() {
            var roll_no = [];
            var exam_code = [];
            var subject_code = [];
            var marks = [];
            $('.roll_no').each(function() {
                roll_no.push($(this).text());
            });
            $('.exam_code').each(function() {
                exam_code.push($(this).text());
            });
            $('.subject_code').each(function() {
                subject_code.push($(this).text());
            });
            $('.marks').each(function() {
                marks.push($(this).text());
            });
            $.ajax({
                url: "partials/_insertMarksData.php",
                method: "POST",
                data: {
                    roll_no: roll_no,
                    exam_code: exam_code,
                    subject_code: subject_code,
                    marks: marks
                },
                success: function(data) {
                    alert("Record inserted successfully");
                    $("td[contenteditable='true']").text("");
                    for (var i = 2; i <= count; i++) {
                        $('tr#' + i + '').remove();
                    }
                }
            });
        });

    });
</script>