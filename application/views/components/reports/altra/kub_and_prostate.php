<table class="table table-bordered visible">
    <tr>
        <td width="116">Kidneys- </td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Kidneys]">Both kidneys are normal in size, shape and position. CMD of the both kidneys are well maintained. P.C systems are not dilated. No mass lesion or calculus is seen.</textarea>
                <span>Both kidneys are normal in size, shape and position. CMD of the both kidneys are well maintained. P.C systems are not dilated. No mass lesion or calculus is seen.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Urnary bladder- </td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Urnary_bladder]">Well filled with regular in outline. NO intravesical lesion or calculus is seen.</textarea>
                <span>Well filled with regular in outline. NO intravesical lesion or calculus is seen.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Prostate </td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Prostate]">Normal in size</textarea>
                <span>Normal in size</span>
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
