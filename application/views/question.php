<div class="module module-question col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 well">
	<h1>Posez votre question</h1>
	<div class="module-body">
		<form class="form-horizontal" role="form" method="post" action="<?= site_url('question/send'); ?>">
			<textarea class="form-control" rows="3" placeholder="Tapez votre question..."></textarea>
			<label class="control-label">Demander l'avis de :</label>
			<div class="question-whos">
				<div class="question-who question-closes">
					<div class="handle glyphicon glyphicon-align-justify"></div>
					<div class="checkbox">
						<label><input type="checkbox"> Mes proches</label>
					</div>
				</div>
				<div class="question-who question-experts">
					<div class="handle glyphicon glyphicon-align-justify"></div>
					<div class="checkbox">
						<label><input type="checkbox"> Les experts</label>
					</div>
				</div>
				<div class="question-who question-everybody">
					<div class="handle glyphicon glyphicon-align-justify"></div>
					<div class="checkbox">
						<label><input type="checkbox"> Tout le monde</label>
					</div>
				</div>
			</div>
			<div class="form-bottom">
				<button type="submit" class="btn btn-primary submit">Envoyer</button>
			</div>
		</form>
	</div>
</div>
