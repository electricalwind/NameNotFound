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
					<a href="#" class="btn btn-link list" title="Liste des réponses"><span class="glyphicon glyphicon-list"></span> Liste des réponses</a>
					<a href="#" class="btn btn-link respond" title="Répondre"><span class="glyphicon glyphicon-share-alt"></span> Répondre</a>
				</div>
				<div class="title"><?= $n["user"]->name; ?> a posé une question :</div>
				<div class="question"><?= $n['content']; ?></div>
				<div class="themes">
					Thèmes :
					<?php foreach ($n['themes'] as $t) { ?>
					<span class="label label-primary"><?= $t["name"]; ?></span>
					<?php } ?>
					<?php if (!$n['themes']) { ?>
						Aucun
					<?php } ?>
				</div>
				<div class="response">
					<form method="post" action="<?= site_url('question/respond/'.$n['id']); ?>">
						<div class="input-group">
							<input type="text" name="response" class="form-control" placeholder="Réponse...">
							<span class="input-group-btn">
								<button class="btn btn-success" type="submit">Envoyer</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<?php } ?>
			<?php if (!$notifs) { ?>
			<div class="no-notifs">Aucune notification</div>
			<?php } ?>
		</div>
    </div>
</div>