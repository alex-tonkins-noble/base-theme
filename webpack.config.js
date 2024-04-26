// WordPress webpack config.
const defaultConfig = require("@wordpress/scripts/config/webpack.config");

// Get Original WebPack Entry Points
const { getWebpackEntryPoints } = require("@wordpress/scripts/utils/config");

// Import Plugin to remove all empty js files after WP Scripts compiles.
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts");

// Utilities.
const path = require("path");
const fs = require("fs");

// Function to dynamically generate entry points, preserving directory structure.
const generateEntryPoints = (baseDir, subDir = "") => {
	const entries = {};
	const fullPath = path.resolve(process.cwd(), baseDir, subDir);
	const files = fs.readdirSync(fullPath);

	files.forEach((file) => {
		const filePath = path.join(fullPath, file);
		if (fs.statSync(filePath).isFile()) {
			const extension = path.extname(file);
			const name = path.basename(file, extension);
			const type = extension === ".js" ? "js" : "css";
			const entryKey = subDir ? `${type}/${subDir}/${name}` : `${type}/${name}`;
			entries[entryKey] = filePath;
		}
	});

	return entries;
};

// Generate entry points for scripts and styles.
const scriptEntries = generateEntryPoints("src/scripts");
const styleEntries = generateEntryPoints("src/styles");
// const acfScriptEntries = generateEntryPoints("src/scripts", "blocks");
// const acfStyleEntries = generateEntryPoints("src/styles", "blocks");
// const dependencyStyleEntries = generateEntryPoints(
// 	"src/styles",
// 	"dependencies"
// );

// Combine all entries.
const combinedEntries = {
	...getWebpackEntryPoints(),
	...scriptEntries,
	...styleEntries,
};

module.exports = {
	...defaultConfig,
	entry: combinedEntries,
	plugins: [
		...defaultConfig.plugins,
		new RemoveEmptyScriptsPlugin({
			stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
		}),
	],
};
