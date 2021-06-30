<h5 class="ultra_title">Usg of Fetal Condition.</h5>
<table class="table table-bordered visible">
    <tr>
        <td>Uterus</td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Uterus]" value="Gravid">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Embryo</td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Embryo]" value="Single">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Fetal CRL </td>
        <td>
            <div class="text">
                <input class="input_file" name="test_report[Fetal_CRL]" value="15 mm">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Gestational age </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Gestational_age]" value="08 +/-1 weeks of gestation.">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Placental position</td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Placental_position]" value="Developing">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Liquor Volume </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Liquor_Volume]" value="Adequate.">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Fetal cardiac pulsation </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Fetal_cardiac_pulsation]" value="Seen">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Other abnormality </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Other_abnormality]" value="NOt seen">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>EDD </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[EDD]" value="13.07.2021">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Comments</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[comments]">08 Weeks of single live gestation.</textarea>
                <span></span>
            </div>
        </td>
    </tr>
</table>
<script>
    let input_file = document.querySelectorAll('.input_file');
    Object.values(input_file).forEach((x)=>{
        x.nextElementSibling.innerText = x.value;
        x.addEventListener('input', ()=>{
            x.nextElementSibling.innerText = x.value;
        });
    });
</script>
