<div class="module module-notifications col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 well">
    <h1>Notifications</h1>
    <div class="module-body">
        <form class="form-inline" role="form">
	        <label class="">Afficher : </label>
            <div class="form-group">
                <select class="form-control multiselect theme-filter" multiple="multiple">
                    <option value="interests">Mes intérêts</option>
                    <option value="experts">Mes expertises</option>
                    <optgroup label="Thèmes">
                        <?php foreach ($themes as $t) { ?>
                        <option value="theme-<?= $t->id; ?>"><?= $t->name; ?></option>
                        <?php } ?>
                    </optgroup>
                </select>
	            <label class="checkbox-inline"><input type="checkbox"> Mes proches uniquement</label>
            </div>
        </form>
		<div class="notifications">
			<?php foreach ($notifs as $n) { ?>
			<div class="notification">
				<div class="buttons">
					<a href="<?= site_url('module/responses/'.$n['id']); ?>" class="btn btn-link list" title="Liste des réponses"><span class="glyphicon glyphicon-list"></span></a>
                    <?php if ($userId) { ?>
                        <a href="#" class="btn btn-link respond" title="Répondre"><span class="glyphicon glyphicon-share-alt"></span> </a>
                    <?php } ?>
                </div>
				<div class="title"><?= $n["user"]->name; ?> a posé une question :</div>
				<div class="question"><?= $n['content']; ?></div>
				<div class="themes">
					Thèmes :
					<?php foreach ($n['themes'] as $t) { ?>
					<span class="label label-primary theme-<?= $t["id"]; ?>"><?= $t["name"]; ?></span>
					<?php } ?>
					<?php if (!$n['themes']) { ?>
						Aucun
					<?php } ?>
				</div>
				<div class="response">
					<form method="post" action="<?= site_url('question/respond/'.$n['id']); ?>">
						<div class="input-group">
							<input type="text" name="response" class="form-control" placeholder="Réponse..." required>
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