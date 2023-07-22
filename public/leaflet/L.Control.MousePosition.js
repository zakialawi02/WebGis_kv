L.Control.MousePosition = L.Control.extend({
  options: {
    position: 'bottomleft',
    separator: ' ; Longitude:  ',
    emptyString: 'Unavailable',
    showUTM: false,
    lngFirst: false,
    numDigits: 8,
    lngFormatter: undefined,
    latFormatter: undefined,
    prefix: "Latitude: "
  },

  onAdd: function (map) {
    this._container = L.DomUtil.create('div', 'leaflet-control-mouseposition');
    L.DomEvent.disableClickPropagation(this._container);
    map.on('mousemove', this._onMouseMove, this);
    this._container.innerHTML = this.options.emptyString;
    return this._container;
  },

  onRemove: function (map) {
    map.off('mousemove', this._onMouseMove)
  },

  _onMouseMove: function (e) {
    var latlng = e.latlng;
    var lng = this.options.lngFormatter ? this.options.lngFormatter(latlng.lng) : L.Util.formatNum(latlng.lng, this.options.numDigits);
    var lat = this.options.latFormatter ? this.options.latFormatter(latlng.lat) : L.Util.formatNum(latlng.lat, this.options.numDigits);
    var value = this.options.lngFirst ? lng + this.options.separator + lat : lat + this.options.separator + lng;

    if (this.options.showUTM) {
      var utmCoord = latlng.utm();
      var utmX = this.options.lngFormatter ? this.options.lngFormatter(utmCoord.x) : L.Util.formatNum(utmCoord.x, this.options.numDigits);
      var utmY = this.options.latFormatter ? this.options.latFormatter(utmCoord.y) : L.Util.formatNum(utmCoord.y, this.options.numDigits);
      var utmValue = utmX + ' , ' + utmY;
      value += ' | UTM: ' + utmValue;
    }

    var prefixAndValue = this.options.prefix + ' ' + value;
    this._container.innerHTML = prefixAndValue;
  }

});

L.Map.mergeOptions({
  positionControl: false
});

L.Map.addInitHook(function () {
  if (this.options.positionControl) {
    this.positionControl = new L.Control.MousePosition();
    this.addControl(this.positionControl);
  }
});

L.control.mousePosition = function (options) {
  return new L.Control.MousePosition(options);
};