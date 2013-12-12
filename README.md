Decimal to Percentage
========================

ExpressionEngine plugin that converts decimals to percentages and vice-versa.

h3. Installation & Usage
Place _decimal_to_percentage_ in your _system/expressionengine/third_party_ directory

```
{exp:decimal_to_percentage value='0.9410'} 
{!-- outputs 94.1% --}

{!-- outputs 0.941 --}
{exp:decimal_to_percentage value='94.1%'' reverse='true'} 
```
Note: removing the percentage sign in reverse mode works too.
