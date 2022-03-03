## Options for geoip

### MaxMind

  apt install libgeo-ip-perl geoip-database

awstats.conf.local:

  LoadPlugin="geoip GEOIP_STANDARD /usr/share/GeoIP/GeoIP.dat"

The `geoipupdate` (contrib!) package can provide updates of the database. This requires an account, license, and overall bother.

### software77

  apt install libgeo-ipfree-perl

awstats.conf.local:

  LoadPlugin="geoipfree"
