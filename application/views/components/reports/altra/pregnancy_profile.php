<table class="table table-bordered visible">
    <tr>
        <td width="190">Uterus---Cravid </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Uterus_Cravid]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Number of foetus--- </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Number_Of_Foetus]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Cardiac pulsation--- </td>
        <td>
            <div class="text">
                <input class="input_file" name="test_report[Cardiac_Pulsation]">
                <pre>Heart rate---</pre>
            </div>
        </td>
    </tr>
    <tr>
        <td>Active foetal movement--- </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Active_Foetal_Movement]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Placental--- </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Placental]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Presentation--- </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Presentation]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Gestational age--- </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Gestational_Age]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Parameter--- </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Parameter]">
                <pre>Length/Diameter    Gestational age     EDD</pre>
            </div>
        </td>
    </tr>
    <tr>
        <td>FL </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[FL]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>BPD </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[BPD]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>CRL </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[CRL]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>GS </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[GS]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>AC </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[AC]">
                <span></span>
            </div>
        </td>
    </tr>
    <tr>
        <td>Liquor- </td>
        <td>
            <div class="text">
                <input type="text" class="input_file" name="test_report[Liquor]">
                <span></span>
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
