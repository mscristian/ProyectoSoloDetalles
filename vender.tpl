{if !empty($opc)}
	{if $opc eq 1}
<h4 class="fa fa-shopping-basket fa-2x">Ingresar Venta</h4><br />
<i class="fa fa-cog fa-spin fa-2x"></i> <li class="fa fa-2x">Pagina en Construcción </li><li class="fa fa-gears fa-2x"></li>
	{elseif $opc eq 2}
<h4 class="fa fa-shopping-basket fa-2x">Devolución</h4><br />
<i class="fa fa-cog fa-spin fa-2x"></i> <li class="fa fa-2x">Pagina en Construcción </li><li class="fa fa-gears fa-2x"></li>
	{/if}
{else}
<h1 class="fa fa-shopping-basket fa-2x">Venta</h1><br />
	<p class="fa fa-shopping-basket fa-5x"></p><br />
<i class="fa fa-cog fa-spin fa-2x"></i> <li class="fa fa-2x">Pagina en Construcción </li><li class="fa fa-gears fa-2x"></li>
{/if}