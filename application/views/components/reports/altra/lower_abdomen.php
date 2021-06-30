<table class="table table-bordered visible">
    <tr>
        <td>Urinary Bladder-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[urinary_bladder]" >Well filled with regular in outline. No intravesical Lesion or calculus in seen</textarea>
                <span>Well filled with regular in outline. No intravesical Lesion or calculus in seen</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Uterus-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[uterus]" >Normal in size and anteverted in position. Myometrial echopattern is uniform cavity is empty.</textarea>
                <span>Normal in size and anteverted in position. Myometrial echopattern is uniform cavity is empty.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Adnexa-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[adnexa]" >Both Adnexal regions appear normal</textarea>
                <span>Both Adnexal regions appear normal</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Cul-de-Sac-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[cul_de_sac]">Free.</textarea>
                <span>Free.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Comments</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[comments]"></textarea>
                <span></span>
            </div>
        </td>
    </tr>
</table>
<script>
    let input_file = document.querySelectorAll('.input_file');
    Object.values(input_file).forEach((x)=>{
        x.addEventListener('input', ()=>{
            x.nextElementSibling.innerText = x.value;
        });
    });
</script>
