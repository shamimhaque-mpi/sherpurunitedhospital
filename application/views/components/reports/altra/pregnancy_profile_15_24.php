<h5 class="ultra_title">Usg of Fetal Condition.</h5>

<table class="table table-bordered visible">
    <tr>
        <td width="190">Fetal number </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Uterus_Cravid]" value="Single">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Presentation</td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Number_Of_Foetus]" value="Cephalic. during examination.">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Fetal BPD</td>
        <td>
            <div class="text">
                <input class="input_file" name="test_report[Cardiac_Pulsation]" value="6.85cm.">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Fetal FL</td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Active_Foetal_Movement]" value="4.38cm">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Gestational age</td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Presentation]" value="25 +/-1 weeks of gestation">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Placental position</td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Gestational_Age]" value="Posterior. away from os">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Liquor Volume</td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Parameter]" value="Normal.">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Fetal cardiac pulsation </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[FL]" value="Seen & regular. FHR-153bpm">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Other abnormality </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[BPD]" value="Not seen.">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>EDD </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[CRL]" value="04.04.2021 (+/-7days)">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Comments</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[comments]">25 +/-1 weeks of single live gestation with cephalic presentation.</textarea>
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