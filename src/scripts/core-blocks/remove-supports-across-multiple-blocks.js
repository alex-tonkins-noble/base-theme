import { addFilter } from "@wordpress/hooks";
import { modifyBlockSettings } from "./functions/modifyBlockSettings";
import { removeAlignmentOptions } from "./functions/removeAlignmentOptions";

// Remove multiple options from layout blocks.
const blocksToModify = ["core/group", "core/columns", "core/column"];

addFilter(
	"blocks.registerBlockType",
	"np/multiple_block_settings_modifications",
	(settings) => modifyBlockSettings(settings, blocksToModify)
);

// Remove alignment options from all blocks
addFilter(
	"blocks.registerBlockType",
	"custom-plugin/remove-alignment-options",
	removeAlignmentOptions
);
