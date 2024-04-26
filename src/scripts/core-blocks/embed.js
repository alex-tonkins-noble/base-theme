import domReady from "@wordpress/dom-ready";
import {
	getBlockVariations,
	unregisterBlockVariation,
} from "@wordpress/blocks";

const allowed_embed_variations = ["youtube", "vimeo"];

// Remove all of the unnecessary Embed Block variations
domReady(function () {
	getBlockVariations("core/embed").forEach((variation) => {
		if (!allowed_embed_variations.includes(variation.name)) {
			unregisterBlockVariation("core/embed", variation.name);
		}
	});
});
