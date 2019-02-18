{extends file="parent:frontend/routing_demo/index.tpl"}
{block name="frontend_index_sidebar"}
{/block}
{block name='frontend_index_content'}
    {$smarty.block.parent}

    <p>ich bin ein Zusatzinhalt</p>
    <ul>
        {foreach $productNames as $productName}
            <li>{$productName}</li>
        {/foreach}
    </ul>
{action module ='widgets' controller='listing' action ='topSeller'}
{/block}