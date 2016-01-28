<!-- Lista as Pessoas Cadastradas -->
<?php if ($pessoas){ ?>
<div id="grid-pessoas">
    <ul>
	<?php foreach($pessoas as $pessoa): ?>
	<li>
	    <a title="Deletar" href="<?php echo base_url() . 'pessoas/deletar/' . $pessoa->id_pessoa; ?>" onclick="return confirm('Confirma a exclusão deste registro?')">X</a>
	    <span> - </span>
	    <a title="Editar" href="<?php echo base_url() . 'pessoas/editar/' . $pessoa->id_pessoa; ?>"><?php echo $pessoa->nome; ?></a>
	    <span> - </span>
	    <span><?php echo $pessoa->email; ?></span>
	</li>
	<?php endforeach ?>
    </ul>
</div>
<?php } ?>
<!-- Fim Lista -->