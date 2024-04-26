import "./style.scss";
import { registerBlockType } from "@wordpress/blocks";
import Edit from "./edit";
import metadata from "./block.json";
import { InnerBlocks } from "@wordpress/block-editor";

registerBlockType(metadata, {
	edit: Edit,
	save: () => <InnerBlocks.Content />,
});
