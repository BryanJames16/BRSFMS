/**
 * Storageå†…å®¹ä»“åº“æ¨¡å—
 * @module zrender/Storage
 * @author Kener (@Kener-æž—å³°, kener.linfeng@gmail.com)
 * @author errorrik (errorrik@gmail.com)
 * @author pissang (https://github.com/pissang/)
 */
define(function (require) {

    'use strict';

    var util = require('./core/util.js');

    var Group = require('./container/Group.js');

    function shapeCompareFunc(a, b) {
        if (a.zlevel === b.zlevel) {
            if (a.z === b.z) {
                if (a.z2 === b.z2) {
                    return a.__renderidx - b.__renderidx;
                }
                return a.z2 - b.z2;
            }
            return a.z - b.z;
        }
        return a.zlevel - b.zlevel;
    }
    /**
     * å†…å®¹ä»“åº“ (M)
     * @alias module:zrender/Storage
     * @constructor
     */
    var Storage = function () {
        // æ‰€æœ‰å¸¸è§„å½¢çŠ¶ï¼Œidç´¢å¼•çš„map
        this._elements = {};

        this._roots = [];

        this._displayList = [];

        this._displayListLen = 0;
    };

    Storage.prototype = {

        constructor: Storage,

        /**
         * è¿”å›žæ‰€æœ‰å›¾å½¢çš„ç»˜åˆ¶é˜Ÿåˆ—
         * @param {boolean} [update=false] æ˜¯å¦åœ¨è¿”å›žå‰æ›´æ–°è¯¥æ•°ç»„
         * @param {boolean} [includeIgnore=false] æ˜¯å¦åŒ…å« ignore çš„æ•°ç»„, åœ¨ update ä¸º true çš„æ—¶å€™æœ‰æ•ˆ
         *
         * è¯¦è§{@link module:zrender/graphic/Displayable.prototype.updateDisplayList}
         * @return {Array.<module:zrender/graphic/Displayable>}
         */
        getDisplayList: function (update, includeIgnore) {
            includeIgnore = includeIgnore || false;
            if (update) {
                this.updateDisplayList(includeIgnore);
            }
            return this._displayList;
        },

        /**
         * æ›´æ–°å›¾å½¢çš„ç»˜åˆ¶é˜Ÿåˆ—ã€‚
         * æ¯æ¬¡ç»˜åˆ¶å‰éƒ½ä¼šè°ƒç”¨ï¼Œè¯¥æ–¹æ³•ä¼šå…ˆæ·±åº¦ä¼˜å…ˆéåŽ†æ•´ä¸ªæ ‘ï¼Œæ›´æ–°æ‰€æœ‰Groupå’ŒShapeçš„å˜æ¢å¹¶ä¸”æŠŠæ‰€æœ‰å¯è§çš„Shapeä¿å­˜åˆ°æ•°ç»„ä¸­ï¼Œ
         * æœ€åŽæ ¹æ®ç»˜åˆ¶çš„ä¼˜å…ˆçº§ï¼ˆzlevel > z > æ’å…¥é¡ºåºï¼‰æŽ’åºå¾—åˆ°ç»˜åˆ¶é˜Ÿåˆ—
         * @param {boolean} [includeIgnore=false] æ˜¯å¦åŒ…å« ignore çš„æ•°ç»„
         */
        updateDisplayList: function (includeIgnore) {
            this._displayListLen = 0;
            var roots = this._roots;
            var displayList = this._displayList;
            for (var i = 0, len = roots.length; i < len; i++) {
                this._updateAndAddDisplayable(roots[i], null, includeIgnore);
            }
            displayList.length = this._displayListLen;

            for (var i = 0, len = displayList.length; i < len; i++) {
                displayList[i].__renderidx = i;
            }

            displayList.sort(shapeCompareFunc);
        },

        _updateAndAddDisplayable: function (el, clipPaths, includeIgnore) {

            if (el.ignore && !includeIgnore) {
                return;
            }

            el.beforeUpdate();

            el.update();

            el.afterUpdate();

            var clipPath = el.clipPath;
            if (clipPath) {
                // clipPath çš„å˜æ¢æ˜¯åŸºäºŽ group çš„å˜æ¢
                clipPath.parent = el;
                clipPath.updateTransform();

                // FIXME æ•ˆçŽ‡å½±å“
                if (clipPaths) {
                    clipPaths = clipPaths.slice();
                    clipPaths.push(clipPath);
                }
                else {
                    clipPaths = [clipPath];
                }
            }

            if (el.type == 'group') {
                var children = el._children;

                for (var i = 0; i < children.length; i++) {
                    var child = children[i];

                    // Force to mark as dirty if group is dirty
                    // FIXME __dirtyPath ?
                    child.__dirty = el.__dirty || child.__dirty;

                    this._updateAndAddDisplayable(child, clipPaths, includeIgnore);
                }

                // Mark group clean here
                el.__dirty = false;

            }
            else {
                el.__clipPaths = clipPaths;

                this._displayList[this._displayListLen++] = el;
            }
        },

        /**
         * æ·»åŠ å›¾å½¢(Shape)æˆ–è€…ç»„(Group)åˆ°æ ¹èŠ‚ç‚¹
         * @param {module:zrender/Element} el
         */
        addRoot: function (el) {
            // Element has been added
            if (this._elements[el.id]) {
                return;
            }

            if (el instanceof Group) {
                el.addChildrenToStorage(this);
            }

            this.addToMap(el);
            this._roots.push(el);
        },

        /**
         * åˆ é™¤æŒ‡å®šçš„å›¾å½¢(Shape)æˆ–è€…ç»„(Group)
         * @param {string|Array.<string>} [elId] å¦‚æžœä¸ºç©ºæ¸…ç©ºæ•´ä¸ªStorage
         */
        delRoot: function (elId) {
            if (elId == null) {
                // ä¸æŒ‡å®šelIdæ¸…ç©º
                for (var i = 0; i < this._roots.length; i++) {
                    var root = this._roots[i];
                    if (root instanceof Group) {
                        root.delChildrenFromStorage(this);
                    }
                }

                this._elements = {};
                this._roots = [];
                this._displayList = [];
                this._displayListLen = 0;

                return;
            }

            if (elId instanceof Array) {
                for (var i = 0, l = elId.length; i < l; i++) {
                    this.delRoot(elId[i]);
                }
                return;
            }

            var el;
            if (typeof(elId) == 'string') {
                el = this._elements[elId];
            }
            else {
                el = elId;
            }

            var idx = util.indexOf(this._roots, el);
            if (idx >= 0) {
                this.delFromMap(el.id);
                this._roots.splice(idx, 1);
                if (el instanceof Group) {
                    el.delChildrenFromStorage(this);
                }
            }
        },

        addToMap: function (el) {
            if (el instanceof Group) {
                el.__storage = this;
            }
            el.dirty();

            this._elements[el.id] = el;

            return this;
        },

        get: function (elId) {
            return this._elements[elId];
        },

        delFromMap: function (elId) {
            var elements = this._elements;
            var el = elements[elId];
            if (el) {
                delete elements[elId];
                if (el instanceof Group) {
                    el.__storage = null;
                }
            }

            return this;
        },

        /**
         * æ¸…ç©ºå¹¶ä¸”é‡Šæ”¾Storage
         */
        dispose: function () {
            this._elements =
            this._renderList =
            this._roots = null;
        }
    };

    return Storage;
});
