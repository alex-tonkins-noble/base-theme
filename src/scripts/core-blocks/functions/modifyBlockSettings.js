// This function is used to filter out specific block support settings.
// Found that it wasn't always so reliable within theme.json so this filter does it for us.
export function modifyBlockSettings(
	settings,
	blocksToModify,
	disableTypography = true,
	disableColours = true,
	disableSpacing = true,
	disableBorder = true,
	disableAlign = true
) {
	const { name, supports } = settings;

	if (!blocksToModify.includes(name)) return settings;

	const typographySupport = supports?.typography;
	const colorSupport = supports?.color;
	const spacingSupport = supports?.spacing;
	const borderSupport = supports?.__experimentalBorder;
	const alignSupport = supports?.align;

	if (disableTypography && typographySupport) {
		settings.supports.typography = {
			fontSize: false,
			lineHeight: false,
			__experimentalFontFamily: false,
			__experimentalFontWeight: false,
			__experimentalFontStyle: false,
			__experimentalTextTransform: false,
			__experimentalTextDecoration: false,
			__experimentalLetterSpacing: false,
			__experimentalDefaultControls: {
				fontSize: false,
			},
		};
	}

	if (disableColours && colorSupport) {
		settings.supports.color = {
			gradients: false,
			heading: false,
			button: false,
			link: false,
			__experimentalDefaultControls: {
				background: false,
				text: false,
			},
		};
	}

	if (disableSpacing && spacingSupport) {
		settings.supports.spacing = {
			margin: [],
			padding: false,
			blockGap: false,
			__experimentalDefaultControls: {
				padding: false,
				blockGap: false,
			},
		};
	}

	if (disableBorder && borderSupport) {
		settings.supports.__experimentalBorder = {
			color: false,
			radius: false,
			style: false,
			width: false,
			__experimentalDefaultControls: {
				color: false,
				radius: false,
				style: false,
				width: false,
			},
		};
	}

	// Align Full / Align Wide Support
	if (disableAlign && alignSupport) {
		settings.supports.align = [];
	}

	return settings;
}
