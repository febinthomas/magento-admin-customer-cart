# Magento2 admin side customer cart

<h3>Instructions</h3>

<h5>Installation</h5>
<ul>
<li>Create a directory `app/code` inside your magento2 installation</li>
<li>Clone this repo to `app/code` directory by running<code>git clone https://github.com/febinthomas/magento-admin-customer-cart.git</code> inside `app/code` directory</li>
<li>To enable module run following commands in root directory of magento installation</li>
</ul>

~~~
php bin/magento module:enable Febin_Cart

php bin/magento setup:upgrade
~~~

<p>In linux machines you may need root privilege to run these commands. In such cases run</p>

~~~
sudo php bin/magento module:enable Febin_Cart

sudo php bin/magento setup:upgrade
~~~

<h5>Un-Installation</h5>
<p>To disable this module, run following commands in root directory of magento installation</p>

~~~
sudo php bin/magento module:disable Febin_Cart

sudo php bin/magento setup:upgrade
~~~