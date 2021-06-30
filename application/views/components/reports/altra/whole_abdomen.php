<table class="table table-bordered visible">
    <tr>
        <td>Liver-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Liver]" >Normal in size with homogenous echotexture No focal lesion is seen.</textarea>
                <span>Normal in size with homogenous echotexture No focal lesion is seen.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>G.B.-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[G_B]">Well visualized. No Calculus is seen in the lumen of the gall bladder.</textarea>
                <span>Well visualized. No Calculus is seen in the lumen of the gall bladder.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Biliary tree-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Biliary_tree]">Intrahepatic biliary channels and CBD are not dilated.</textarea>
                <span>Intrahepatic biliary channels and CBD are not dilated.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Pancreas-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Pancreas]">Appears normal. Parenchymal echotexture is uniform.</textarea>
                <span>Appears normal. Parenchymal echotexture is uniform.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Spleen-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Spleen]">Normal in size with uniform echopattern. No focal lesion is seen.</textarea>
                <span>Normal in size with uniform echopattern. No focal lesion is seen.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Kidneys-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Kidneys]">Both kidneys are normal in size, shape and position. CMD of the both kidneys are well maintained. P.C systems are not dilated No mass lesion or calculus is seen.</textarea>
                <span>Both kidneys are normal in size, shape and position. CMD of the both kidneys are well maintained. P.C systems are not dilated No mass lesion or calculus is seen.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Urinary bladder-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Urinary_bladder]">Well filled with regular in outline. No intravesical lesion or calculus is seen.</textarea>
                <span>Well filled with regular in outline. No intravesical lesion or calculus is seen.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Prostate-</td>
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
