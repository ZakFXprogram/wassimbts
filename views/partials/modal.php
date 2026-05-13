<?php
/**
 * Partial : modale projet
 * Injectée une seule fois dans le DOM, remplie dynamiquement par JS.
 */
?>
<div id="modal-overlay" class="modal-overlay" aria-hidden="true">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        <div class="modal-header">
            <div>
                <div id="modal-skill-label" class="modal-skill-label"></div>
                <h3 id="modal-title" class="modal-title"></h3>
            </div>
            <button class="modal-close" id="modal-close" aria-label="Fermer">✕</button>
        </div>
        <div id="modal-body" class="modal-body"></div>
    </div>
</div>
