<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 24/04/2018
 * Time: 16:29
 */
include "templates/sidebar.view.php";
?>
<main class='container'>
    <div class="content">
        <div class="packageContent-admin">

            <div class="container">
                <div class="row">
                    <div class="col-l-6">
                        <h1>Gestion de contenus : Pages</h1>
                    </div>

                    <div class="col-l-6" style="text-align: right">
                        <p><a href="getPagesAdmin">Retour</a></p>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-l-7">
                        <h2>Sélectionnez le modèle de pages que vous souhaitez :</h2>
                    </div>
                </div>
                <div class="row" style="margin: 0 8px 5px 8px;">

                    <div class="container liste-templates">
                        <ul id="templates">
                            <li>
                                <input id="template1" type="checkbox" checked onclick="chooseTemplate('template1')">
                                <label for="template1" checked>
                                    <span class="nom-coiffeur">Template n°1</span>
                                </label>
                            </li>
                            <li>
                                <input id="template2" type="checkbox" onclick="chooseTemplate('template2')">
                                <label for="template2">
                                    <span class="nom-coiffeur">Template n°2</span>
                                </label>
                            </li>
                            <li>
                                <input id="template3" type="checkbox" onclick="chooseTemplate('template3')">
                                <label for="template3">
                                    <span class="nom-coiffeur">Template n°3</span>
                                </label>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>


            <br>

            <div class='col-l-12 center'>
                <form action='<?php echo DIRNAME . "Admin/addPages"; ?>' method="post" >
                    <input class='input' required id='title' type='text' name='title'
                           <?php if( isset( $page_title ) ):
                                echo "value ='".$page_title . "'";
                           endif;?>
                           placeholder='Titre de la page' style='margin-bottom: 10px; '>


                    <div id="content2">



                    </div>

                    <?php $i = 1;

                    if( !empty( $page_content ) ):
                        foreach ( $page_content as $content ): ?>

                            <div hidden class="contentHidden" id="saveContent<?php echo $i;?>" >

                                <?php echo $content ?>
                            </div>
                            <?php $i++; endforeach; ?>
                     <?php endif;?>

                    <input type="text" id="template_choosen" hidden name="id_template" value="" />

                    <label>
                        <input class='addPageRadio' type='radio' name='isNavbar'

                        <?php if( isset( $page_navbar ) && $page_navbar == 1 ):
                            echo "value ='" . $page_navbar."' checked >Afficher dans la barre de navigation";
                        else:
                            echo "value='1' >Afficher dans la barre de navigation";
                        endif; ?>


                    </label>
                    <label>
                        <input class='addPageRadio' type='radio' name='isNavbar' ";
                        <?php if( isset( $page_navbar ) && $page_navbar == 0 ):
                            echo "value ='" . $page_navbar."' checked >Ne pas afficher dans la barre de navigation";
                        else:
                            echo "value='0' >Ne pas afficher dans la barre de navigation";
                        endif; ?>
                    </label>
                    &nbsp;
                    <input required class='input' id='url' name='url' placeholder='url de la page' type='text'
                    <?php if( isset( $page_url ) ):
                        echo "value ='" . $page_url."' >";
                    else:
                        echo "value='' >";
                    endif; ?>
                    <br>
                    <?php if( isset( $modify ) ):
                        echo "<input type='text' name='isModify' hidden value=1 > ";
                        echo "<input type='text' name='pageId' hidden value=" . $page_id ."> ";
                        echo "<input type='submit' id='sendPages' class='buttonUser' value='Engeristrer les modifications' >";
                    else:
                        echo " <input type='submit' id='sendPages' class='buttonUser' value='Créer la page' />";
                    endif; ?>
                </form>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript" src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
<script type="text/javascript" src="../public/js/index.js"></script>
<script>
    $(function () { $('#title').keyup( function () { $('#url').val( $("#title").val().replace(/\s/g, "_")); }) } )</script>


<script src='../public/ckeditor/ckeditor.js'></script>

<script>
    $("input[id^='template']").click( function(){
        if( $(this).is(':checked') ) {
            $( "input[id^='template']" ).prop( "checked", false );
            $( this ).prop( "checked", true );
        }
    });
</script>


<script>
    function chooseTemplate( template = 1 ) {

        var value = $("#template_choosen");
        var divContent = $("#content2");
        var contentsSaved = $('.contentHidden');

        var saveContent = [];
        var j = 0;

        console.log( contentsSaved.length );
        if( contentsSaved.length > 0 ){
            for( var i = 0; i < contentsSaved.length; i++ ){

                saveContent[j] = contentsSaved[i];
                j++;
            }

            switch (template){
                case 'template1':
                    divContent[0].innerHTML =
                        '<div class="row">' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content1" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[0].innerHTML +

                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content2" placeholder="content" style="width: 100%; height: 100px;"> ' +
                        saveContent[1].innerHTML +
                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content3" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[2].innerHTML+
                        '                    </textarea></div>' +
                        '</div><div class="row">' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content4" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[3].innerHTML +
                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content5" placeholder="content" style="width: 100%; height: 100px;"> ' +
                        saveContent[4].innerHTML +
                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content6" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[5].innerHTML+
                        '                    </textarea></div></div>';
                    value.attr("value", 1);
                    break;
                case 'template2':
                    divContent[0].innerHTML =
                        '<div class="row">' +
                        '<div class="col-l-4">' +
                        '<textarea class="ckeditor" name="content1" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[0].innerHTML +
                        '        </textarea>' +
                        '    </div>' +
                        '<div class="col-l-4">' +
                        '        <textarea class="ckeditor" name="content2" placeholder="content" style="width: 100%; height: 100px;"> ' +
                        saveContent[1].innerHTML +
                        '        </textarea>' +
                        '    </div>' +
                        '<div class="col-l-4">' +
                        '        <textarea class="ckeditor" name="content3" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[2].innerHTML +
                        '        </textarea>' +
                        '     </div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-l-12">' +
                        '        <textarea class="ckeditor" name="content4" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[3].innerHTML +
                        '        </textarea>' +
                        '    </div>' +
                        '</div>';
                    value.attr("value", 2);
                    break;
                case 'template3':
                    divContent[0].innerHTML =
                        '<div class="row">' +
                        '<div class="col-l-12">' +
                        '        <textarea class="ckeditor" name="content1" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[0].innerHTML +
                        '        </textarea>' +
                        '    </div>' +
                        '</div>'+
                        '<div class="row">' +
                        '<div class="col-l-4">' +
                        '<textarea class="ckeditor" name="content2" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[1].innerHTML +
                        '        </textarea>' +
                        '    </div>' +
                        '<div class="col-l-4">' +
                        '        <textarea class="ckeditor" name="content3" placeholder="content" style="width: 100%; height: 100px;"> ' +
                        saveContent[2].innerHTML +
                        '        </textarea>' +
                        '    </div>' +
                        '<div class="col-l-4">' +
                        '        <textarea class="ckeditor" name="content4" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[3].innerHTML +
                        '        </textarea>' +
                        '     </div>' +
                        '</div>';
                    value.attr("value", 3);
                    break;
                case 'template4':
                    break;
                default:
                    divContent[0].innerHTML =
                        '<div class="row">' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[0].innerHTML +
                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;"> ' +
                        saveContent[1].innerHTML +
                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[2].innerHTML +
                        '                    </textarea></div>' +
                        '</div><div class="row">' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[3].innerHTML +
                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;"> ' +
                        saveContent[4].innerHTML +
                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;">' +
                        saveContent[5].innerHTML +
                        '                    </textarea></div></div>';
            }


        }
        else{

            switch (template){
                case 'template1':
                    divContent[0].innerHTML =
                        '<div class="row">' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content1" placeholder="content" style="width: 100%; height: 100px;">' +


                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content2" placeholder="content" style="width: 100%; height: 100px;"> ' +

                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content3" placeholder="content" style="width: 100%; height: 100px;">' +

                        '                    </textarea></div>' +
                        '</div><div class="row">' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content4" placeholder="content" style="width: 100%; height: 100px;">' +

                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content5" placeholder="content" style="width: 100%; height: 100px;"> ' +

                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content6" placeholder="content" style="width: 100%; height: 100px;">' +
                        
                        '                    </textarea></div></div>';
                    value.attr("value", 1);
                    break;
                case 'template2':
                    divContent[0].innerHTML =
                        '<div class="row">' +
                        '<div class="col-l-4">' +
                        '<textarea class="ckeditor" name="content1" placeholder="content" style="width: 100%; height: 100px;">' +

                        '        </textarea>' +
                        '    </div>' +
                        '<div class="col-l-4">' +
                        '        <textarea class="ckeditor" name="content2" placeholder="content" style="width: 100%; height: 100px;"> ' +

                        '        </textarea>' +
                        '    </div>' +
                        '<div class="col-l-4">' +
                        '        <textarea class="ckeditor" name="content3" placeholder="content" style="width: 100%; height: 100px;">' +

                        '        </textarea>' +
                        '     </div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-l-12">' +
                        '        <textarea class="ckeditor" name="content4" placeholder="content" style="width: 100%; height: 100px;">' +

                        '        </textarea>' +
                        '    </div>' +
                        '</div>';
                    value.attr("value", 2);
                    break;
                case 'template3':
                    divContent[0].innerHTML =
                        '<div class="row">' +
                        '<div class="col-l-12">' +
                        '        <textarea class="ckeditor" name="content1" placeholder="content" style="width: 100%; height: 100px;">' +

                        '        </textarea>' +
                        '    </div>' +
                        '</div>'+
                        '<div class="row">' +
                        '<div class="col-l-4">' +
                        '<textarea class="ckeditor" name="content2" placeholder="content" style="width: 100%; height: 100px;">' +

                        '        </textarea>' +
                        '    </div>' +
                        '<div class="col-l-4">' +
                        '        <textarea class="ckeditor" name="content3" placeholder="content" style="width: 100%; height: 100px;"> ' +

                        '        </textarea>' +
                        '    </div>' +
                        '<div class="col-l-4">' +
                        '        <textarea class="ckeditor" name="content4" placeholder="content" style="width: 100%; height: 100px;">' +

                        '        </textarea>' +
                        '     </div>' +
                        '</div>';
                    value.attr("value", 3);
                    break;
                case 'template4':
                    break;
                default:
                    divContent[0].innerHTML =
                        '<div class="row">' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;">' +

                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;"> ' +

                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;">' +

                        '                    </textarea></div>' +
                        '</div><div class="row">' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;">' +
                        
                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;"> ' +
                        
                        '                    </textarea></div>' +
                        '<div class="col-l-4"><textarea class="ckeditor" name="content" placeholder="content" style="width: 100%; height: 100px;">' +
                        
                        '                    </textarea></div></div>';
            }
        }




        CKEDITOR.replaceAll( 'ckeditor', {
            language: 'fr',
            bodyId: "contentPage",
            contentsCss: '../public/css/style.css',
            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',       groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' },
                { name: 'about' }
            ]
        });
    }
</script>

<script> window.onload = chooseTemplate( 'template1' );


</script>

