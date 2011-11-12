<?php include_once 'layout/header.inc.php'; ?>


<div id="form-user-input">
    <h3 class="title">Thêm một câu hỏi mới...</h3>
    <form class="form-admin" method="post" action="">
        <fieldset>
            <legend>Nội dung câu hỏi</legend>
            <textarea cols="50" rows="5" name="txtQuestion"></textarea>
        </fieldset>
        <fieldset>
            <legend>Đáp án</legend>
            <table>
                <tr>
                    <td><input type="radio" name="checkAnswerTrue" value="A" checked="checked"/></td>
                    <td>A</td>
                    <td><input type="text" name="txtAnswerA" /></td>
                </tr>
                <tr>
                    <td><input type="radio" name="checkAnswerTrue" value="B" /></td>
                    <td>B</td>
                    <td><input type="text" name="txtAnswerB" /></td>
                </tr>
                <tr>
                    <td><input type="radio" name="checkAnswerTrue" value="C" /></td>
                    <td>C</td>
                    <td><input type="text" name="txtAnswerC" /></td>
                </tr>
                <tr>
                    <td><input type="radio" name="checkAnswerTrue" value="D" /></td>
                    <td>D</td>
                    <td><input type="text" name="txtAnswerD" /></td>
                </tr>
            </table>
        </fieldset>
        <div class="form-button">
            <input id="submit" type="submit" name="submit" value="Thêm mới"/>
            <input id="reset" type="reset" name="reset" value="Nhập lại"/>
        </div>
    </form>
</div>


<?php include_once 'layout/footer.inc.php'; ?>