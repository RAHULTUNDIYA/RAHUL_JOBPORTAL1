<?php 
include 'admin/db_connect.php'; 
?>
<style>
#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.vacancy-list{
cursor: pointer;
width: 250px;
}
span.hightlight{
    background: yellow;
}
                </style>
                   <div class="py-5">
                    <div class="input-group w-50 m-auto">
                        <input placeholder="Search Job here.." type="text" class="form-control" id="filter">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <section id="list">
                    <div class="container mt-3 pt-2">
                        <h4 class="text-center">Available Jobs</h4>
                        <hr class="divider">
                        <div class="d-flex  justify-content-center">
                            <div class="d-flex flex-wrap"> <?php
                        $vacancy = $conn->query("SELECT * FROM vacancy order by date(date_created) desc ");
                        while($row = $vacancy->fetch_assoc()):
                            $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                            unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                            $desc = strtr(html_entity_decode($row['description']),$trans);
                            $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
                        ?>
                        <div class="card vacancy-list mx-2 my-2" data-id="<?php echo $row['id'] ?>">
                            <div class="card-body">
                                <h3><b class="filter-txt"><?php echo $row['position'] ?></b></h3>
                                <span><small>NO: <?php echo $row['availability'] ?></small></span>
                                <hr>
                                <larger class="truncate filter-txt"><?php echo strip_tags($desc) ?></larger>
                                <br>
                               

                            </div>
                        </div>
                        <br>
                        <?php endwhile; ?>

                            </div>
                    
                        </div>
                    
                    </div>
                </section>


                <script>
                    $('.card.vacancy-list').click(function(){
                        location.href = "index.php?page=view_vacancy&id="+$(this).attr('data-id')
                    })
                    $('#filter').keyup(function(e){
                        var filter = $(this).val()

                        $('.card.vacancy-list .filter-txt').each(function(){
                            var txto = $(this).html();
                            txt = txto
                            if((txt.toLowerCase()).includes((filter.toLowerCase())) == true){
                                $(this).closest('.card').toggle(true)
                            }else{
                                $(this).closest('.card').toggle(false)
                            
                            }
                        })
                    })
                </script>