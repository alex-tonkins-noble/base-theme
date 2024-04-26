import domReady from "@wordpress/dom-ready";
import { registerBlockStyle } from "@wordpress/blocks";
import { addFilter } from "@wordpress/hooks";
import { modifyBlockSettings } from "./functions/modifyBlockSettings";

addFilter("blocks.registerBlockType", "np/button", (settings) =>
	modifyBlockSettings(settings, ["core/button"], true, false, true, true, false)
);

// Remove all initial Button Styles
addFilter(
	"blocks.registerBlockType",
	"np/button_block_styles",
	(props, name) => {
		if (name == "core/button") {
			props.styles = [];
		}
		return props;
	}
);

// Add custom Button Styles
domReady(function () {
	registerBlockStyle("core/button", {
		name: "btn-primary",
		label: "Primary",
		isDefault: true,
	});

	registerBlockStyle("core/button", {
		name: "btn-secondary",
		label: "Secondary",
	});
});
