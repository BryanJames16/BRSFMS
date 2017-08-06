define(function () {
    var dpr = 1;
    // If in browser environment
    if (typeof window !== 'undefined') {
        dpr = Math.max(window.devicePixelRatio || 1, 1);
    }
    /**
     * configé»˜è®¤é…ç½®é¡¹
     * @exports zrender/config
     * @author Kener (@Kener-æž—å³°, kener.linfeng@gmail.com)
     */
    var config = {
        /**
         * debugæ—¥å¿—é€‰é¡¹ï¼šcatchBrushExceptionä¸ºtrueä¸‹æœ‰æ•ˆ
         * 0 : ä¸ç”Ÿæˆdebugæ•°æ®ï¼Œå‘å¸ƒç”¨
         * 1 : å¼‚å¸¸æŠ›å‡ºï¼Œè°ƒè¯•ç”¨
         * 2 : æŽ§åˆ¶å°è¾“å‡ºï¼Œè°ƒè¯•ç”¨
         */
        debugMode: 0,

        // retina å±å¹•ä¼˜åŒ–
        devicePixelRatio: dpr
    };
    return config;
});

