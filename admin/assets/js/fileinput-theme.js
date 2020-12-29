/*!
 * bootstrap-fileinput v5.1.3
 * http://plugins.krajee.com/file-input
 *
 * Font Awesome icon theme configuration for bootstrap-fileinput. Requires font awesome assets to be loaded.
 *
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2020, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD-3-Clause
 * https://github.com/kartik-v/bootstrap-fileinput/blob/master/LICENSE.md
 */
(function ($) {
    "use strict";

    $.fn.fileinputThemes.fa = {
        fileActionSettings: {
            removeIcon: '<i class="bi bi-trash"></i>',
            uploadIcon: '<i class="bi bi-upload"></i>',
            uploadRetryIcon: '<i class="bi bi-arrow-clockwise"></i>',
            downloadIcon: '<i class="bi bi-download"></i>',
            zoomIcon: '<i class="bi bi-zoom-in"></i>',
            dragIcon: '<i class="bi bi-arrows-move"></i>',
            indicatorNew: '<i class="bi bi-plus-circle"></i>',
            indicatorSuccess: '<i class="bi bi-check-circle"></i>',
            indicatorError: '<i class="bi bi-exclamation-circle-fill"></i>',
            indicatorLoading: '<i class="bi bi-hourglass"></i>',
            indicatorPaused: '<i class="bi bi-pause-fill"></i>'
        },
        layoutTemplates: {
            fileIcon: '<i class="bi bi-file-earmark-fill"></i> '
        },
        previewZoomButtonIcons: {
            prev: '<i class="bi bi-caret-left-fill"></i>',
            next: '<i class="bi bi-caret-right-fill"></i>',
            toggleheader: '<i class="bi bi-arrow-down-up"></i>',
            fullscreen: '<i class="bi bi-arrow-down-up"></i>',
            borderless: '<i class="bi bi-arrow-up-right-square-fill"></i>',
            close: '<i class="bi bi-x-circle"></i>'
        },
        previewFileIcon: '<i class="bi bi-file-earmark-fill"></i>',
        browseIcon: '<i class="bi bi-folder2-open"></i>',
        removeIcon: '<i class="bi bi-trash"></i>',
        cancelIcon: '<i class="bi bi-slash-circle"></i>',
        pauseIcon: '<i class="bi bi-pause"></i>',
        uploadIcon: '<i class="bi bi-upload"></i>',
        msgValidationErrorIcon: '<i class="bi bi-exclamation-circle"></i> '
    };
})(window.jQuery);
