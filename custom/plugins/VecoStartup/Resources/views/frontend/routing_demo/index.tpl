{extends file="parent:frontend/index/index.tpl"}

{block name='frontend_index_content'}
    <h1>Hallo ich bin eine {$currentAction} action </h1>

    <a href="{url controller='RoutingDemo' action=$nextAction }">
        {s name="GoToNextPage"}{/s}
    </a>
{/block}