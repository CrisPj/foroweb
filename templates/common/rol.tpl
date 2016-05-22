{assign var="rol" value=$smarty.session['rol']}
{if $rol == 'visitante'}
    {include file='home/header.tpl'}
{elseif $rol == 'miembro'}
    {include file='miembro/header.tpl'}
{elseif $rol == 'admin'}
    {include file='admin/header.tpl'}
{/if}
