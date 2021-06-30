<h5 class="ultra_title">Usg of Fetal Condition.</h5>

<table class="table table-bordered visible">
    <tr>
        <td width="190">Urinary bladder : </td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Urinary_bladder]">Optimally filled normal in outline and wall thickness. No demonstrable intravesical lesion noted Uterus is mildly enlarged / normal in size . Cavity shows double lined circular echogenic structure and an echo free sac within it on the anterior / posterior / fundal region of the endometrium. The sac measures - mm. Yolk sac seen within it. Myometrial echotexture shows no abnormality. Uterus is anteverted in position and cavity no abnormal fluid collection . Os is not dilated</textarea>
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Adnexa : </td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Adnexa]">Both ovaries shows normal in size & echotexture</textarea>
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Cul-de-sac : </td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Cul-de-sac]">Shows no abnormal fluid collection</textarea>
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
                <textarea class="input_file" name="test_report[comments]">5 +- 1 weeks of intrautcrine single gestation</textarea>
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
