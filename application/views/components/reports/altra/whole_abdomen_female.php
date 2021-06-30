<table class="table table-bordered visible">
    <tr>
        <td width="116">Liver-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Liver]">Normal is size with homogenous echotexture. No Focal lesion is seen</textarea>
                <span>Normal is size with homogenous echotexture. No Focal lesion is seen</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>G.B.-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[G_B]">Well visualized. No calculus is seen in the lumen of the gall bladder.</textarea>
                <span>Well visualized. No calculus is seen in the lumen of the gall bladder.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Biliary tree-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Biliary_Tree]">Intrahepatic biliary channels and CBD are not dilated.</textarea>
                <span>Intrahepatic biliary channels and CBD are not dilated.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Pancreas-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Pancreas]">Appears normal. parenchymal echotexture is uniform.</textarea>
                <span>Appears normal. parenchymal echotexture is uniform.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Spleen-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Spleen]">Normal in size with uniform echopttern. No focal Lesion is seen</textarea>
                <span>Normal in size with uniform echopttern. No focal Lesion is seen</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Kidneys-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Kidneys]">Both kedneys are normal in size shape and position. CMD of the both kidneys are well maintained. P.C systems are not dilated. No mass lesion or calculus is seen.</textarea>
                <span>Both kedneys are normal in size shape and position. CMD of the both kidneys are well maintained. P.C systems are not dilated. No mass lesion or calculus is seen.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Urinary bladder-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Urinary_Bladder]">Well filled with regular in outline No intravesical lesion or calculus is seen.</textarea>
                <span>Well filled with regular in outline No intravesical lesion or calculus is seen.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Uterus-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Uterus]">Normal in size and anteverted in position. Mymetrial echopattern is uniform. Uterine cavity is empty.</textarea>
                <span>Normal in size and anteverted in position. Mymetrial echopattern is uniform. Uterine cavity is empty.</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Adnexa-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Adnexa]">Both adnexal regions appear normal</textarea>
                <span>Both adnexal regions appear normal</span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Cul-de-sac-</td>
        <td>
            <div class="text">
                <textarea class="input_file" name="test_report[Cul_De_Sac]">Free.</textarea>
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
