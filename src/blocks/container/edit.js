import "./editor.scss";
import { __ } from "@wordpress/i18n";
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import { InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const { containerSize } = attributes;

	// Define the inner block props
	const innerBlocksPropsExtras = {
		orientation: "vertical",
	};

	// Add any additional props to the top-level Block Props here.
	const additionalWrapperProps = {
		className: `container-size-${containerSize}`,
	};

	// Define the block props to merge in with the inner block props
	const blockProps = useBlockProps(additionalWrapperProps);

	// Split out the child elements and the inner block props for a more efficient structure in the admin
	const { children, ...innerBlocksProps } = useInnerBlocksProps(
		blockProps,
		innerBlocksPropsExtras
	);

	const sizes = [
		{ label: __("Small", "np-container"), value: "small" },
		{ label: __("Regular", "np-container"), value: "regular" },
		{ label: __("Wide", "np-container"), value: "wide" },
	];

	const handlecontainerSizeChange = (val) => {
		setAttributes({ containerSize: val });
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Options", "np-container")}>
					<SelectControl
						label={__("Container Size", "np-container")}
						help={__("Change the width of the Container.", "np-container")}
						value={containerSize}
						options={
							sizes &&
							sizes.map((size) => ({
								label: size.label,
								value: size.value,
							}))
						}
						onChange={handlecontainerSizeChange}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...innerBlocksProps}>{children}</div>
		</>
	);
}
