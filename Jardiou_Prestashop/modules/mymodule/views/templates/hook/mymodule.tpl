<!-- Block mymodule -->

<div id ="mymodule_block_left" class ="block">
    <h1>Hellooooooooo! </h1>
    <div class ="block_content">
        <p>{l s='Hello,' mod='mymodule'}
            {if isset($my_module_name) && $my_module_name}
                {$my_module_name}
            {else}
                World
            {/if}
            !
        </p>
        <ul>
            <li><a href="{$my_module_link}" title ="click this link"> Click me!</a></li>
        </ul>
    </div>
</div>

<!-- /Block mymodule -->