<div class="module module-notifications col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 well">
    <h1>Vos notifications</h1>
    <div class="module-body">
        <form class="form-inline" role="form">
	        <label class="">Afficher : </label>
            <div class="form-group">
                <select class="form-control multiselect" multiple="multiple">
                    <option value="interests">Mes intérêts</option>
                    <option value="experts">Mes expertises</option>
                    <optgroup label="Thèmes">
                        <?php foreach ($themes as $t) { ?>
                        <option value="<?= $t; ?>"><?= $t; ?></option>
                        <?php } ?>
                    </optgroup>
                </select>
	            <label class="checkbox-inline"><input type="checkbox"> Résolues</label>
	            <label class="checkbox-inline"><input type="checkbox"> Mes proches</label>
            </div>
        </form>
		<div class="notifications">
			<?php foreach ($notifs as $n) { ?>
			<div class="notification">
				<div class="buttons">
					<a href="#" class="btn btn-link list" title="Liste des réponses"><span class="glyphicon glyphicon-list"></span></a>
					<a href="#" class="btn btn-link respond" title="Répondre"><span class="glyphicon glyphicon-share-alt"></span></a>
				</div>
				<div class="title">Un utilisateur a posé une question :</div>
				<div class="question"><?= $n['content']; ?></div>
				<div class="themes">
					Thèmes :
					<?php foreach ($n['themes'] as $t) { ?>
					<span class="label label-primary"><?= $t["name"]; ?></span>
					<?php } ?>
				</div>
				<div class="response">
					<form method="post" action="">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Réponse...">
							<span class="input-group-btn">
								<button class="btn btn-success" type="button">Envoyer</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<?php } ?>
		</div>
    </div>
</div>