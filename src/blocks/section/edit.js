import "./editor.scss";
import { __ } from "@wordpress/i18n";
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function Edit(props) {
	const { attributes } = props;
	const {} = attributes;

	// Define the inner block props
	const innerBlocksPropsExtras = {
		orientation: "vertical",
		template: [["np/container"]],
	};

	// Add any additional props to the top-level Block Props here.
	const additionalWrapperProps = {};

	// Define the block props to merge in with the inner block props
	const blockProps = useBlockProps(additionalWrapperProps);

	// Split out the child elements and the inner block props for a more efficient structure in the admin
	const { children, ...innerBlocksProps } = useInnerBlocksProps(
		blockProps,
		innerBlocksPropsExtras
	);

	return (
		<>
			<div {...innerBlocksProps}>{children}</div>
		</>
	);
}
