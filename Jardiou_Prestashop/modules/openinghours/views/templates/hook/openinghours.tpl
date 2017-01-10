<!-- Block openinghours -->
<div class="testouille" style="float:left;">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="font-weight:bold;">Horaires d'ouverture du magasin</button>

        <ul class="dropdown-menu" >
            <!-- Boucle pour générer les horaires d'ouverture en fonction des jours -->
            {foreach from=$openingHours item=line}
                <li> {$line.Day} : {$line.Beginning} - {$line.Ending}</li>
            {/foreach}           
        </ul>
    </div>
</div>
<!-- /Block openinghours -->
