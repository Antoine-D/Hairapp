<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 01/06/2018
 * Time: 11:55
 */
$week = $vars['week'];
$appointments = $vars['appointments'];
$hairdressers = $vars['hairdressers'];
$opening = $vars['opening'];
$closing = $vars['closing'];
$duration = $vars['duration'];
$availableHours = $vars['availableHours'];

$hairdresser_class = [];

$haidresserCounter = 1;

?>
<div class="row">

    <?php foreach ( $hairdressers as $hairdresser ): ?>

    <button class="col-l-2 col-s-3 col-m-9 center <?php echo "hairdresser".$haidresserCounter; ?> button"
            onclick="hairdresser(<?php echo $haidresserCounter; ?>)">
        <?php echo $hairdresser->getFirstname();  ?>
        <?php $hairdresser_class[$hairdresser->getId()] = "coiffeur-".$haidresserCounter ; ?>
        <?php $haidresserCounter += 1; ?>
    </button>
    &nbsp;

    <?php endforeach; ?>

    <button class="col-l-2 col-s-3 col-m-9 center all button" onclick="hairdresser('all')">Tous</button>

</div>
&nbsp;
<div class="row">
    <article class="col-l-12 col-s-12 col-m-12 center">
        <div style="overflow-x: auto">
            <table class="col-l-2 col-s-2 center" id="planning">
                <th>Horaires</th>

                <?php foreach ( $availableHours as $hour ): ?>
                        <tr>
                            <td>
                                <?php echo $hour; ?>
                            </td>
                        </tr>


                <?php endforeach; ?>
            </table>

            <?php foreach ( $week as $day => $date): ?>
                <table class="col-l-2 col-s-2 center" id="planning" style="margin-bottom: 80px;">
                    <th> <?php echo $day; ?></th>


                    <?php foreach ( $availableHours as $hour ): ?>
                        <?php $exist = 0 ; ?>
                        <?php foreach ( $appointments as $appointment  ): ?>

                            <?php if ( $appointment->getHourAppointment() == $hour. ":00" && $appointment->getDateAppointment() == $date ): ?>
                                <tr>
                                    <td

                                        <?php foreach ( $hairdresser_class as $hairdresser => $value ): ?>

                                        <?php if ( $appointment->getIdHairdresser()  == $hairdresser ): ?>
                                            class="<?php echo $value; ?>">
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <span> <?php echo $appointment->getFirstname(); ?></span>
                                    </td>
                                </tr>
                                <?php $exist = 1;?>
                            <?php endif; ?>

                        <?php endforeach; ?>
                        <?php if ( $exist == 0 ): ?>
                            <tr>
                                <td>-</td>
                            </tr>
                        <?php endif; ?>


                    <?php endforeach; ?>

                    <?php
                        //TODO: changer les valeurs de i par les valeurs ouverture/fermeture choisies à l'install
                    ?>


                </table>
            <?php endforeach; ?>


        </div>

        &nbsp;
    </article>
</div>

