<?php
include('includes/head.php');
if (!Login::isLoggedIn()|| $type != 2) {
    echo '<script>window.location="404.php"</script>';
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $questions = $_POST['questions'];
    $options = $_POST['options'];
    $option_questions = $_POST['options_question'];
    $option_questions = array_count_values($option_questions);
    $j = 0;
    DB::query('INSERT INTO survey VALUES(\'\',:name,:description)', array(':name' => $title, ':description' => $description));
    $survey_id = DB::query('SELECT id FROM survey WHERE name=:name ORDER BY id DESC LIMIT 1', array(':name' => $title))[0]['id'];
    $counter=0;
    for ($i = 1; $i <= count($questions); $i++) {
        $options_count = $option_questions[$i]+$counter;
        DB::query('INSERT INTO survey_questions VALUES(\'\',:name,:survey_id)', array(':name' => $questions[$i - 1], ':survey_id' => $survey_id));
        $question_id = DB::query('SELECT id FROM survey_questions WHERE name=:name ORDER BY id DESC LIMIT 1', array(':name' => $questions[$i - 1]))[0]['id'];

        for ($j = $counter; $j < $options_count; $j++) {
            DB::query('INSERT INTO survey_options VALUES(\'\',:name,:survey_id)', array(':name' => $options[$j], ':survey_id' => $question_id));
            $counter++;
        }
    }
    echo '<script>alert("Survey Added")</script>';
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        DB::query('DELETE FROM survey_questions WHERE survey_id=:id', array(':id' => $_GET["id"]));
        DB::query('DELETE FROM survey WHERE id=:id', array(':id' => $_GET["id"]));
        echo '<script>alert("Survey Removed")</script>';
        echo '<script>window.location="add-survey.php"</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hikingify | Add Survey</title>
    <?php
    include('includes/links.php');
    ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php include("includes/aside.php") ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Survey</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Survey</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-8" style="margin: 0 auto;">
                            <!-- general form elements disabled -->
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Add Survey</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Survey Title </label>
                                                    <input type="text" name="title" class="form-control" placeholder="Survey Title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Write An Overview"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="survey-questions-container" data-count="1">

                                            <div class="question-container first_question">
                                                <div class="row">
                                                    <div class="col-sm-11">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Question 1</label>
                                                            <input type="text" name="questions[]" class="form-control suvey-questions" placeholder="Question 1">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-1">
                                                        <div class="form-group">
                                                            <label>Remove</label>
                                                            <button type="button" name="addd" class="form-control btn btn-block btn-danger btn-sm remove"><i class="fas fa-trash-alt"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="options-container pl-5 pr-5" data-count="1" data-question="1">
                                                    <div class="row first_option option">
                                                        <div class="col-sm-11">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Option 1</label>
                                                                <input type="text" name="options[]" class="form-control suvey-options" placeholder="Option 1">
                                                                <input type="hidden" name="options_question[]" value="1">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-1">
                                                            <div class="form-group">
                                                                <label>Remove</label>
                                                                <button type="button" name="addd" class="form-control btn btn-block btn-danger btn-sm remove"><i class="fas fa-trash-alt"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-5">
                                                    <div class="form-group col-sm-2">
                                                        <label>Add Option</label>
                                                        <button type="button" name="addd" class="form-control btn btn-block btn-success btn-sm" onclick="addOption(this)"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <!-- text input -->
                                                <script type='text/javascript'>
                                                    function addOption(el) {

                                                        var container = el.closest('.row').previousElementSibling;

                                                        console.log(el.closest('.row'));
                                                        console.log(container);
                                                        var options_count = parseInt(container.getAttribute("data-count"));
                                                        var question = parseInt(container.getAttribute("data-question"));
                                                        number = 1;
                                                        for (i = 0; i < number; i++) {
                                                            container.setAttribute('data-count', ++options_count);
                                                            var first_option = document.querySelector('.first_option');
                                                            var option_clone = first_option.cloneNode(true);

                                                            option_clone.querySelector('label').innerHTML = "Option " + parseInt(options_count);
                                                            option_clone.querySelector('input').placeholder = "Option " + parseInt(options_count);
                                                            option_clone.querySelector('input').value = "";
                                                            option_clone.querySelector('input+input').value = parseInt(question);
                                                            option_clone.querySelector('.remove').addEventListener('click', function() {
                                                                removeOption(this);
                                                            });
                                                            container.appendChild(option_clone);
                                                        }
                                                    }

                                                    function addFields() {
                                                        var container = document.querySelector(".survey-questions-container");
                                                        var questions_count = parseInt(container.getAttribute("data-count"));
                                                        number = 1;
                                                        for (i = 0; i < number; i++) {
                                                            container.setAttribute('data-count', ++questions_count);
                                                            var first_question = document.querySelector('.first_question');
                                                            var question_clone = first_question.cloneNode(true);
                                                            //remove options
                                                            var getOptions = question_clone.querySelectorAll('.option');
                                                            getOptions[0].parentNode.setAttribute('data-count', 1);
                                                            for (let j = 0; j < getOptions.length; j++) {
                                                                if (j == 0) {
                                                                    getOptions[j].querySelector('input+input').value = parseInt(questions_count);
                                                                    getOptions[j].querySelector('input').value = "";
                                                                    continue;
                                                                }
                                                                getOptions[j].parentNode.removeChild(getOptions[j]);
                                                            }
                                                            question_clone.querySelector('.options-container').setAttribute('data-question', questions_count);
                                                            question_clone.querySelector('label').innerHTML = "Question " + parseInt(questions_count);
                                                            question_clone.querySelector('input').placeholder = "Question " + parseInt(questions_count);
                                                            question_clone.querySelector('input').value = "";
                                                            question_clone.querySelector('.remove').addEventListener('click', function() {
                                                                removeField(this);
                                                            });
                                                            container.appendChild(question_clone);
                                                        }
                                                    }

                                                    function removeOption(element) {
                                                        var element = element.closest('.row');
                                                        console.log(element);
                                                        element.parentNode.removeChild(element);
                                                    }

                                                    function removeField(element) {
                                                        var element = element.closest('.question-container');
                                                        element.parentNode.removeChild(element);
                                                    }
                                                </script>
                                                <div class="form-group">
                                                    <label>Add Question</label>
                                                    <button type="button" name="addd" class="form-control btn btn-block btn-success btn-sm" onclick="addFields()"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group" id="containert"> </div>
                                            </div>
                                        </div>
                                        <div class="row"> </div>
                                        <div class="row">
                                            <button type="submit" name="submit" class="btn btn-block btn-primary btn-sm">Send Survey</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- general form elements disabled -->
                            <!-- /.card -->
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <div class="row">
                        <div class="col-md-8" style="margin: 0 auto;">
                            <div class="card card-danger">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">All Surveys</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <style>
                                            td,
                                            tr {
                                                text-align: center;
                                            }
                                        </style>
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <style>
                                                abbr[title],
                                                acronym[title] {
                                                    border-bottom: none;
                                                    text-decoration: none;
                                                }
                                            </style>
                                            <tbody>
                                                <?php
                                                $faq_data = DB::query('SELECT * FROM survey');
                                                foreach ($faq_data as $fd) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $fd['id'] ?>
                                                        </td>
                                                        <td><abbr title="<?php echo $fd['name']; ?>"><?php echo truncate($fd['name'], 35); ?></abbr></td>
                                                        <td><abbr title="<?php echo $fd['description']; ?>"><?php echo truncate($fd['description'], 35); ?></abbr></td>
                                                        <td><?php echo CalculateRating($fd['id']); ?></td>
                                                        <td>
                                                            <button class="btn  btn-outline-danger btn-sm" onClick="(function(){window.location='add-survey.php?action=delete&id=<?php echo $fd["id"]; ?>';return false;})();return false;"><i class="fas fa-trash"></i></button>
                                                            &nbsp;&nbsp;
                                                            <button class="btn btn-outline-primary btn-sm" onClick="(function(){window.location='view-survey.php?id=<?php echo $fd['id']; ?>';return false;})();return false;"><i class="fas fa-eye"></i></button>
                                                            &nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-footer -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('includes/footer.php'); ?>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>