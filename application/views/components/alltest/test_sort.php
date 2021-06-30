<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

<style>
    @media all and (min-width: 768px){
        .align_items_wraper{
            column-count: 2;
            user-select: none;
        }
    }
    .align_items_wraper .items{
        border: 1px solid #ccc;
        margin-bottom: -1px;
        padding: 10px;
        display: flex;
        align-items: center;
        align-content: center;
        justify-content: flex-start;
        min-width: 100%;
        cursor: move;
    }
     @media all and (min-width: 768px){
        .align_items_wraper .items{
            -webkit-column-break-inside: avoid;
            page-break-inside: avoid;
        }
     }
    .align_items_wraper .items .icon{
        padding: 0 15px;
    }
    
    
    div.drag-sort-active {
      background: transparent;
      color: transparent;
    }
</style>
<div class="container-fluid">
    <div class="row">
	<?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Test Sorting</h1>
                </div>
            </div>

            <div class="panel-body">
                <div class="align_items_wraper">
                    <?php
                        if ($results)
                            foreach ($results as $key => $value) { 
                    ?>
                        <div class="items" data-id="<?php echo $value->id; ?>">
                            <div><?php echo $key+1; ?></div>
                            <div class="icon"></div>
                            <div><?php echo ($value->test_name) ? $value->test_name : ""; ?></div>
                        </div> 
                    <?php } ?>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>


<script>
    function enableDragSort(listClass) {
      const sortableLists = document.getElementsByClassName(listClass);
      Array.prototype.map.call(sortableLists, (list) => {enableDragList(list)});
    }
    
    function enableDragList(list) {
      Array.prototype.map.call(list.children, (item) => {enableDragItem(item)});
    }
    
    function enableDragItem(item) {
      item.setAttribute('draggable', true)
      item.ondrag = handleDrag;
      item.ondragend = handleDrop;
    }
    
    function handleDrag(item) {
      const selectedItem = item.target,
            list = selectedItem.parentNode,
            x = event.clientX,
            y = event.clientY;
      
      selectedItem.classList.add('drag-sort-active');
      let swapItem = document.elementFromPoint(x, y) === null ? selectedItem : document.elementFromPoint(x, y);

      if (list === swapItem.parentNode) {
        swapItem = swapItem !== selectedItem.nextSibling ? swapItem : swapItem.nextSibling;
        list.insertBefore(selectedItem, swapItem);
      }
    }
    function handleDrop(item) {
      let dragSortEnable         = document.querySelector(".align_items_wraper"),
          dragSortEnableChildren = dragSortEnable.children,
          i                      = 0;
          
      item.target.classList.remove('drag-sort-active');
      for(i; i<dragSortEnableChildren.length; i++){
        dragSortEnableChildren[i].setAttribute('data-position', i);
      }
      updatePosition();
    }
    (()=> {enableDragSort('align_items_wraper')})();
    
    
    // update position in db by ajax start
    function updatePosition() {
        var getPosition = document.querySelectorAll(".align_items_wraper>.items"),
            positionObj = {},
            positionStr = '';
        Object.values(getPosition).forEach((value)=>{
            positionObj[value.dataset.id]=value.dataset.position;
        });
        positionStr = JSON.stringify(positionObj);
        
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log((this.responseText));
                if(this.responseText==1){
                    location.reload();
                }
            }
        };
        xhttp.open("POST", "<?php echo site_url('alltest/sort/test'); ?>", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`positionStr=${positionStr}`);
    }
    // update position in db by ajax end
</script>

