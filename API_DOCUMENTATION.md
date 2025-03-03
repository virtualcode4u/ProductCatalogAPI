# Product Catalog API Documentation  

This documentation provides details on the available API endpoints for the **Product Catalog API**.  

---

## **Base URL**  

http://your-domain.com/api/v1


---

## **Endpoints**  

### **1. Get a List of Products (Paginated)**
**Endpoint:**  

GET /api/v1/products

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `category_id` | int    | Filter products by category ID       |
| `search`     | string | Search products by name/description |

**Response Example:**  
```json
{
    "data": [
        {
            "id": 1,
            "name": "Sample Product",
            "description": "This is a sample product",
            "sku": "SKU1234",
            "price": 99.99,
            "category_id": 2,
            "created_at": "2025-03-01T12:00:00.000Z",
            "updated_at": "2025-03-01T12:00:00.000Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "last_page": 5
    }
}

```
### **2. Get a List of Products (Paginated)**
**Endpoint:**  

GET /api/v1/products

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `category_id` | int    | Filter products by category ID       |
| `search`     | string | Search products by name/description |

**Response Example:**  
```json
{
    "data": [
        {
            "id": 1,
            "name": "Sample Product",
            "description": "This is a sample product",
            "sku": "SKU1234",
            "price": 99.99,
            "category_id": 2,
            "created_at": "2025-03-01T12:00:00.000Z",
            "updated_at": "2025-03-01T12:00:00.000Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "last_page": 5
    }
}
```

### **1. Get a List of Products (Paginated)**
**Endpoint:**  

GET /api/v1/products

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `category_id` | int    | Filter products by category ID       |
| `search`     | string | Search products by name/description |

**Response Example:**  
```json
{
    "data": [
        {
            "id": 1,
            "name": "Sample Product",
            "description": "This is a sample product",
            "sku": "SKU1234",
            "price": 99.99,
            "category_id": 2,
            "created_at": "2025-03-01T12:00:00.000Z",
            "updated_at": "2025-03-01T12:00:00.000Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "last_page": 5
    }
}

### **3. Get a List of Products (Paginated)**
**Endpoint:**  

GET /api/v1/products

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `category_id` | int    | Filter products by category ID       |
| `search`     | string | Search products by name/description |

**Response Example:**  
```json
{
    "data": [
        {
            "id": 1,
            "name": "Sample Product",
            "description": "This is a sample product",
            "sku": "SKU1234",
            "price": 99.99,
            "category_id": 2,
            "created_at": "2025-03-01T12:00:00.000Z",
            "updated_at": "2025-03-01T12:00:00.000Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "last_page": 5
    }
}

### **4. Get a List of Products (Paginated)**
**Endpoint:**  

GET /api/v1/products

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `category_id` | int    | Filter products by category ID       |
| `search`     | string | Search products by name/description |

**Response Example:**  
```json
{
    "data": [
        {
            "id": 1,
            "name": "Sample Product",
            "description": "This is a sample product",
            "sku": "SKU1234",
            "price": 99.99,
            "category_id": 2,
            "created_at": "2025-03-01T12:00:00.000Z",
            "updated_at": "2025-03-01T12:00:00.000Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "last_page": 5
    }
}

### **5. Get a List of Products (Paginated)**
**Endpoint:**  

GET /api/v1/products

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `category_id` | int    | Filter products by category ID       |
| `search`     | string | Search products by name/description |

**Response Example:**  
```json
{
    "data": [
        {
            "id": 1,
            "name": "Sample Product",
            "description": "This is a sample product",
            "sku": "SKU1234",
            "price": 99.99,
            "category_id": 2,
            "created_at": "2025-03-01T12:00:00.000Z",
            "updated_at": "2025-03-01T12:00:00.000Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "last_page": 5
    }
}

### **6. Delete a Product**
**Endpoint:**  

DELETE /api/v1/products/{id}

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `id` | int    | The ID of the product       |

**Response Example:**  
```json
{
    "message": "Product deleted successfully"
}
