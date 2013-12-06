<div class="module module-responses col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 well">
    <h1>Réponses</h1>
    <div class="module-body">
        <div class="question">
                <div class="question">
                    <div class="question"><h3><center><?= $question->content; ?></center></h3></div>
                </div>
        </div>
		<div class="notifications">
			<?php foreach ($notifs as $n) { ?>
			<div class="notification">
				<div class="buttons">
					<a href="#" class="btn btn-link list" title="Non"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                    <a href="#" class="btn btn-link list" title="Non"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                    <a href="#" class="btn btn-link list" title="Non"><span class="glyphicon glyphicon-star"></span></a>
                </div>
				<div class="title"><?= $n["user"]->name; ?> a répondu :</div>
				<div class="question"><?= $n['content']; ?></div>
			</div>
			<?php } ?>
			<?php if (!$notifs) { ?>
			<div class="no-notifs">Aucune notification</div>
			<?php } ?>
		</div>
    </div>
</div>